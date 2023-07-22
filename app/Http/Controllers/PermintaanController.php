<?php

namespace App\Http\Controllers;

use App\Mail\Aduan;
use App\Mail\ApprovePermintaan;
use App\Mail\Permintaan as AppPermintaan;
use App\Mail\PermintaanCustom;
use App\Models\DescPermintaan;
use App\Models\Inventaris;
use App\Models\Jenis_barang;
use App\Models\Permintaan;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PermintaanController extends Controller
{
   public function index()
   {
      if (Auth::user()->hasRole('staff')) {
         $data = Permintaan::select('permintaan.*', 'users.name as name', 'status.nama_status')
            ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
            ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
            ->where(['permintaan.deleted' => 1, 'permintaan.id_user' => Auth::user()->id])->orderBy('permintaan.id', 'DESC')->get();
      } else {

         $data = Permintaan::select('permintaan.*', 'users.name as name', 'status.nama_status')
            ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
            ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
            ->where('permintaan.deleted', 1)->orderBy('permintaan.id', 'DESC')->get();
      }
      return DataTables::of($data)->make(true);
   }

   public function search($no_aduan)
   {
      $data = Permintaan::select('permintaan.*', 'users.name as name', 'status.nama_status')
      ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
      ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
      ->where('no_aduan', 'like', "%{$no_aduan}%")
      ->first();
      if ($data == null) {
         abort(404, 'data tidak ditemukan');
      }
      return response()->json($data);
   }

   public function view()
   {
      return view('views.permintaan.permintaan');
   }

   public function viewPermintaan()
   {
      return view('views.permintaan.permintaanView');
   }
   public function add()
   {
      $jenis = Jenis_barang::where('deleted', 1)->get();
      $random = Str::random(7);
      return view('views.permintaan.permintaaanAdd', [
         'no_aduan' => $random,
         'jenis' => $jenis,
      ]);
   }
   public function print($no_aduan)
   {
      $data = Permintaan::where('no_aduan', 'like', "%{$no_aduan}%")->first();

      $count = DescPermintaan::leftJoin('status', 'desc_permintaan.id_status', '=', 'status.id')
         ->where('desc_permintaan.deleted', 1)
         ->where('desc_permintaan.no_aduan', $data->no_aduan)
         ->count();

      // $desc = DescPermintaan::select('desc_permintaan.*', 'status.nama_status', 'status.color', 'users.name as name', 'inventaris.no_inventaris')
      //    ->leftJoin('inventaris', 'desc_permintaan.id_inventaris', '=', 'inventaris.id')
      //    ->leftJoin('status', 'desc_permintaan.id_status', '=', 'status.id')
      //    // ->leftJoin('users', 'desc_permintaan.id_teknisi', '=', 'users.id')
      //    ->where('desc_permintaan.deleted', 1)
      //    ->where('desc_permintaan.no_aduan', $no_aduan)
      //    ->orderByDesc('desc_permintaan.id') // Mengurutkan berdasarkan id secara descending
      //    ->get();

      $desc = DescPermintaan::where('desc_permintaan.deleted', 1)
         ->where('desc_permintaan.no_aduan', $no_aduan)->get();
      $nama = $data->id . '/' . $data->tgl_masuk . ' -Laporan-Aduan.pdf';

      $detail = ['data' => $data, 'total' => $count, 'desc' => $desc];
      $pdf = Pdf::loadview('views.permintaan.permintaan_print', $detail);
      return $pdf->download($nama);
      //   return view('views.pengaduan.aduan_print',$detail);

   }
   public function updateView($id)
   {
      $inventaris = Inventaris::where('deleted', 1)->get();
      $status = Status::where('deleted', 1)->get();

      $data = Permintaan::select('permintaan.*', 'status.nama_status', 'status.color', 'users.name', 'users.email')
         ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
         ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
         ->where('permintaan.id', $id)->where('permintaan.deleted', 1)->first();
      $count = DescPermintaan::leftJoin('status', 'desc_permintaan.id_status', '=', 'status.id')
         ->where('desc_permintaan.deleted', 1)
         ->where('desc_permintaan.no_aduan', $data->no_aduan)
         ->count();
      // dd($data);
      return view('views.permintaan.permintaanEdit', [
         'data' => $data,
         'total' => $count,
         'inventaris' => $inventaris,
         'status' => $status

      ]);
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'alasan_permintaan' => 'required',
         'no_aduan' => 'required',
         'no_hp' => 'required',
         'lokasi' => 'required',
         'email_atasan' => 'required',
      ]);

      $input = [
         'id_user' => Auth::user()->id,
         'alasan_permintaan' => $request->alasan_permintaan,
         'no_aduan' => $request->no_aduan,
         'no_hp' => $request->no_hp,
         'tgl_masuk' => new DateTime,
         'lokasi' => $request->lokasi,
         'email_atasan' => $request->email_atasan,
         'id_status' => 1,
         // 'nama_pengambil' => $request->nama_pengambil,

      ];

      $data = Permintaan::create($input);
      $dataAduan = Permintaan::select('permintaan.*', 'status.*')
         ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
         ->where('permintaan.no_aduan', $request->no_aduan)
         ->where('permintaan.deleted', 1)->first();
      $this->sendMail(Auth::user()->email, $dataAduan);
      $this->sendMailApprove($request->email_atasan, $dataAduan);

      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DB::connection('mysql')->select("SELECT * FROM permintaan where deleted =1 and id = $id");
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = Permintaan::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      $this->validate($request, [
         'id_user' => 'required',
         'alasan_permintaan' => 'required',
         'no_aduan' => 'required',
         'no_hp' => 'required',
         'lokasi' => 'required',
         'email_atasan' => 'required',
         'nama_pengambil' => 'required',
      ]);

      $input = [
         'id_user' => $request->id_user,
         'alasan_permintaan' => $request->alasan_permintaan,
         'no_aduan' => $request->no_aduan,
         'no_hp' => $request->no_hp,
         'lokasi' => $request->lokasi,
         'email_atasan' => $request->email_atasan,
         'tgl_masuk' => $request->tgl_masuk,
         'tgl_keluar' => $request->tgl_keluar,
         'id_status' => $request->id_status,
         'nama_pengambil' => $request->nama_pengambil,

      ];

      $data = Permintaan::where('id', $id)->update($input);
      return response()->json($data);
   }
   public function sendMail($email, $data)
   {
      // dd($data);
      $mailData = [
         'alasan_permintaan' => $data->alasan_permintaan,
         'no_aduan' => $data->no_aduan,
         'no_hp' => $data->no_hp,
         'lokasi' => $data->lokasi,
         // 'email' => $data->email,
         'email_atasan' => $data->email_atasan,

      ];
      Mail::to($email)->send(new AppPermintaan($mailData));

      // Mail::to($email)->send(new Aduan($mailData));
   }
   public function sendMailApprove($email, $data)
   {
      // dd($data);
      $mailData = [
         'alasan_permintaan' => $data->alasan_permintaan,
         'no_aduan' => $data->no_aduan,
         'no_hp' => $data->no_hp,
         'lokasi' => $data->lokasi,
         // 'email' => $data->email,
         'email_atasan' => $data->email_atasan,

      ];
      Mail::to($email)->send(new ApprovePermintaan($mailData));
   }

   public function approve($no_aduan)
   {
      try {
         $data = Permintaan::where('no_aduan', $no_aduan)->first();
         $data->update(['approve_status' => 2]);
      } catch (\Throwable $th) {
         dd($th);
      }
   }
   public function tindakLanjut($id, Request $request)
   {
      $input = [
         'id_status' => $request->id_status,
         'nama_pengambil' => $request->nama_pengambil,
         'tgl_keluar' => $request->tgl_keluar,

      ];

      $data = Permintaan::where('id', $id)->first();
      $update = $data->update($input);
      return response()->json($update);
   }
   public function sendMailCostum($email, $data, $content)
   {
      // dd($data);

      $mailData = [
         'alasan_permintaan' => $data->alasan_permintaan,
         'no_aduan' => $data->no_aduan,
         'no_hp' => $data->no_hp,
         'lokasi' => $data->lokasi,
         // 'email' => $data->email,
         'email_atasan' => $data->email_atasan,
      ];
      Mail::to($email)->send(new PermintaanCustom($mailData, $content));
   }

   public function ambil($id)
   {
      $content = [
         'title' => "Konfirmasi Pengambilan Barang",
         'content' => "Sistem kami telah melihat salah satu permintaan Anda/staff  terkait permintaan ke Layanan IT, barang yang anda minta sudah dapat dilakukan pengambilan",
         'footer' => "Anda dapat melakukan pengambilan perangkat digedung Layanaan TI, PT.Pupuk Sriwijaya Palembang. Demikian yang dapat kami sampaikan, kami ucapkan terima kasih.",
         'button' => '',
      ];
      $permintaan = Permintaan::select('permintaan.*', 'users.name as name', 'users.email as email', 'status.nama_status')
         ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
         ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
         ->where('permintaan.deleted', 1)
         ->where('permintaan.no_aduan', $id)->first();

      $this->sendMailCostum($permintaan->email, $permintaan, $content);
   }
}
