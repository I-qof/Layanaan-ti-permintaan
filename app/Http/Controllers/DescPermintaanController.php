<?php

namespace App\Http\Controllers;

use App\Mail\ApprovePermintaan;
use App\Mail\PermintaanCustom;
use App\Models\DescPembelian;
use App\Models\DescPermintaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class DescPermintaanController extends Controller
{
   public function index()
   {
      $data = DescPermintaan::select('desc_permintaan.*', 'jenis_barang.nama_jenis')
         ->leftJoin('jenis_barang', 'desc_permintaan.id_jenis_barang', '=', 'jenis_barang.id')
         ->where('desc_permintaan.deleted', 1)->get();
      return DataTables::of($data)->make(true);
   }

   public function get($no_aduan)
   {
      $data = DescPermintaan::select('desc_permintaan.*', 'status.nama_status', 'status.color', 'users.name as name', 'jenis_barang.nama_jenis')
         ->leftJoin('jenis_barang', 'desc_permintaan.id_jenis_barang', '=', 'jenis_barang.id')
         ->leftJoin('status', 'desc_permintaan.id_status', '=', 'status.id')
         ->leftJoin('users', 'desc_permintaan.id_teknisi', '=', 'users.id')
         ->where('desc_permintaan.deleted', 1)
         ->where('desc_permintaan.no_aduan', $no_aduan)
         ->orderByDesc('desc_permintaan.id') // Mengurutkan berdasarkan id secara descending
         ->get();
      return DataTables::of($data)->make(true);
   }

   public function view()
   {
      return view('views.permintaan.permintaan');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'id_jenis_barang' => 'required',
         'deskripsi' => 'required',
         'no_aduan' => 'required',
      ]);

      $input = [
         'id_jenis_barang' => $request->id_jenis_barang,
         'deskripsi' => $request->deskripsi,
         'no_aduan' => $request->no_aduan,
      ];

      $data = DescPermintaan::create($input);
      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DescPermintaan::where('id', $id)->first();
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = DescPermintaan::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      if ($request->id_jenis_barang) {
         $input = [
            'id_jenis_barang' => $request->id_jenis_barang,
            'deskripsi' => $request->deskripsi,
            'no_aduan' => $request->no_aduan,
         ];
      } else {
         $input = [
            'id_inventaris' => $request->id_inventaris,
            'diagnosa' => $request->diagnosa,
            'deskripsi' => $request->deskripsi,
            'id_status_deskripsi' => $request->id_status_deskripsi,
            'id_status_qc' => $request->id_status_qc,
            'id_status_penyelesaian' => $request->id_status_penyelesaian,
            'id_teknisi' => $request->id_teknisi,
            'stock_status' => $request->stock_status,
            'pembelian_status' => $request->pembelian_status,
            'id_jenis_barang' => $request->id_jenis_barang,
            'id_status' => $request->id_status,
            'tindakan' => $request->tindakan,
         ];
      }


      $data = DescPermintaan::where('id', $id)->update($input);
      return response()->json($data);
   }

   public function tersedia($id)
   {
      try {
         $data = DescPermintaan::where('id', $id)->first();
         $data->update(['stock_status' => 2]);
      } catch (\Throwable $th) {
         dd($th);
      }
   }

   public function kosong($id)
   {
      try {
         $data = DescPermintaan::where('id', $id)->first();

         $content = [
            'title' => "Konfirmasi Pembelian",
            'content' => "Sistem kami telah melihat salah satu permintaan Anda/staff memerlukan persetujuan Anda terkait permintaan ke Layanan IT",
            'footer' => "Anda dapat menolak dan menyetujui pembelian dengan mengklik kedua tombol di bawah ini. Demikian yang dapat kami sampaikan, kami ucapkan terima kasih.",
            'button' => '<a href="' . URL::to('desc-permintaan/beli/' . $id) . '" style="display: inline-block; margin-right: 10px; padding: 10px 20px; background-color: #336699; color: #ffffff; text-decoration: none;">Setuju</a> <a href="' . URL::to('desc-permintaan/tidakBeli/' . $id) . '" style="display: inline-block; padding: 10px 20px; background-color: #ff0000; color: #ffffff; text-decoration: none;">Tidak setuju</a>',
        ];

         try {
            $permintaan = Permintaan::select('permintaan.*', 'users.name as name', 'users.email as email', 'status.nama_status')
               ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
               ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
               ->where('permintaan.deleted', 1)
               ->where('permintaan.no_aduan', $data->no_aduan)->first();
            $data->update(['stock_status' => 1]);

            $this->sendMailCostum($permintaan->email_atasan, $permintaan, $content);
         } catch (\Throwable $th) {
            dd($th);
         }
      } catch (\Throwable $th) {
         dd($th);
      }
   }

   public function beli($id)
   {
      try {
         $data = DescPermintaan::where('id', $id)->first();
         $data->update(['pembelian_status' => 1]);
      } catch (\Throwable $th) {
         dd($th);
      }
   }
   public function tidakBeli($id)
   {
      try {
         $data = DescPermintaan::where('id', $id)->first();
         $data->update(['pembelian_status' => 2]);
      } catch (\Throwable $th) {
         dd($th);
      }
   }

   public function status(Request $request, $id)
   {
      $input = [
         'id_status_deskripsi' => $request->id_status_deskripsi,
         'id_status_qc' => $request->id_status_qc,
         'id_status_penyelesaian' => $request->id_status_penyelesaian,
         'id_status' => $request->id_status1
      ];
      try {
         $data = DescPermintaan::where('id', $id)->first();
         $data->update($input);
         return response()->json($data);
      } catch (\Throwable $th) {
         dd($th);
      }
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
}
