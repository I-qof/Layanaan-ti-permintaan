<?php

namespace App\Http\Controllers;

use App\Mail\Aduan as AppAduan;
use App\Models\Aduan;
use App\Models\DescAduan;
use App\Models\Inventaris;
use App\Models\Sperpat;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf as BarryvdhPdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AduanController extends Controller
{


   public function index()
   {
      // $data = DB::connection('mysql')->select("SELECT * FROM aduan where deleted = 1");
      $data = Aduan::select('aduan.*','status.nama_status','status.color')->leftJoin('status', 'aduan.id_status', '=', 'status.id')->where('aduan.deleted', 1)->orderByDesc('aduan.id')->get();
      return DataTables::of($data)->make(true);
   }

   public function search($no_aduan)
   {
      $data = Aduan::where('no_aduan', 'like', "%{$no_aduan}%")->first();
      if($data==null){
         abort(404,'data tidak ditemukan');
      }
      return response()->json($data);
   }
   public function print($no_aduan){
      $data = Aduan::where('no_aduan', 'like', "%{$no_aduan}%")->first();
     
      $count = DescAduan::leftJoin('status', 'desc_aduan.id_status', '=', 'status.id')
      ->where('desc_aduan.deleted', 1)
      ->where('desc_aduan.no_aduan', $data->no_aduan)
      ->count();

      $desc = DescAduan::select('desc_aduan.*', 'status.nama_status', 'status.color', 'users.name as name','inventaris.no_inventaris')
      ->leftJoin('inventaris', 'desc_aduan.id_inventaris', '=', 'inventaris.id')
      ->leftJoin('status', 'desc_aduan.id_status', '=', 'status.id')
      ->leftJoin('users', 'desc_aduan.id_teknisi', '=', 'users.id')
      ->where('desc_aduan.deleted', 1)
      ->where('desc_aduan.no_aduan', $no_aduan)
      ->orderByDesc('desc_aduan.id') // Mengurutkan berdasarkan id secara descending
      ->get();
      $nama =$data->id .'/'.$data->tgl_masuk . ' -Laporan-Aduan.pdf';

      $detail = ['data'=>$data,'total' => $count,'desc'=>$desc];
      $pdf = BarryvdhPdf::loadview('views.pengaduan.aduan_print',$detail);
    	return $pdf->download($nama);
   //   return view('views.pengaduan.aduan_print',$detail);
      
   }

   public function view()
   {
      return view('views.pengaduan.pengaduan');
   }
   public function viewAduan()
   {
      return view('views.pengaduan.pengaduanView');
   }
   public function add()
   {
      $inventaris = Inventaris::where('deleted', 1)->get();
      $random = Str::random(40);
      return view('views.pengaduan.pengaduanAdd', [
         'no_aduan' => $random,
         'inventaris' => $inventaris
      ]);
   }
   public function updateView($id)
   {
      $inventaris = Sperpat::where('deleted', 1)->get();
      $status = Status::where('deleted', 1)->get();

      $data = Aduan::select('aduan.*','status.nama_status','status.color','users.name',)
      ->leftJoin('status', 'aduan.id_status', '=', 'status.id')
      ->leftJoin('users','aduan.email','=','users.email')
      ->where('aduan.id', $id)->where('aduan.deleted', 1)->first();
      $count = DescAduan::leftJoin('status', 'desc_aduan.id_status', '=', 'status.id')
         ->where('desc_aduan.deleted', 1)
         ->where('desc_aduan.no_aduan', $data->no_aduan)
         ->count();
         // dd($data);
      return view('views.pengaduan.pengaduanEdit', [
         'data' => $data,
         'total' => $count,
         'sperpat' => $inventaris,
         'status' => $status

      ]);
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         // 'id_user' => 'required',
         'keluhan' => 'required',
         'no_aduan' => 'required',
         'no_hp' => 'required',
         'lokasi' => 'required',
         'email' => 'required',
         // 'email_atasan' => 'required',
         // 'tgl_masuk' => 'required',
         // 'tgl_keluar' => 'required',
         // 'id_status' => 'required',
         // 'nama_pengambil' => 'required',
      ]);

      $input = [
         // 'id_user' => $request->id_user,
         'keluhan' => $request->keluhan,
         'no_aduan' => $request->no_aduan,
         'no_hp' => $request->no_hp,
         'lokasi' => $request->lokasi,
         'email' => $request->email,
         'email_atasan' => $request->email_atasan,
         'tgl_masuk' => new DateTime(),
         // 'email_atasan' => $request->email_atasan,
         // 'tgl_keluar' => $request->tgl_keluar,
         // 'id_status' => $request->id_status,
         // 'nama_pengambil' => $request->nama_pengambil,

      ];

      $data = Aduan::create($input);
      $dataEmail = [$request->email, $request->email_atasan];
      $dataAduan = Aduan::rightJoin('status', 'aduan.id_status', '=', 'status.id')->where('aduan.no_aduan', $request->no_aduan)->where('aduan.deleted', 1)->first();
      // dd($dataAduan);
      try {
         foreach ($dataEmail as $key => $value) {
            
            $this->sendMail($value,$dataAduan);
         }
      } catch (\Throwable $th) {
         dd($th);
      }
      return response()->json($data);
   }

   public function sendMail($email,$data)
   {
      // dd($data);
      $mailData = [
         'keluhan' => $data->keluhan,
         'no_aduan' => $data->no_aduan,
         'no_hp' => $data->no_hp,
         'lokasi' => $data->lokasi,
         'email' => $data->email,
         'email_atasan' => $data->email_atasan,
        
      ];

      Mail::to($email)->send(new AppAduan($mailData));
   }


   public function getById($id)
   {
      $data = DB::connection('mysql')->select("SELECT * FROM aduan where deleted =1 and id = $id");
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = Aduan::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      // $this->validate($request, [
      //    // 'id_user' => 'required',
      //    'keluhan' => 'required',
      //    'no_aduan' => 'required',
      //    'no_hp' => 'required',
      //    'lokasi' => 'required',
      //    'email_atasan' => 'required',
      //    'tgl_masuk' => 'required',
      //    'tgl_keluar' => 'required',
      //    'id_status' => 'required',
      //    'nama_pengambil' => 'required',
      // ]);

      $input = [
         // 'id_user' => $request->id_user,
         'keluhan' => $request->keluhan,
         'no_aduan' => $request->no_aduan,
         'no_hp' => $request->no_hp,
         'lokasi' => $request->lokasi,
         'email_atasan' => $request->email_atasan,
         'tgl_masuk' => $request->tgl_masuk,
         'tgl_keluar' => $request->tgl_keluar,
         'id_status' => $request->id_status,
         'nama_pengambil' => $request->nama_pengambil,

      ];

      $data = Aduan::where('id', $id)->update($input);
      return response()->json($data);
   }

   public function tindakLanjut($id,Request $request){
      $input = [ 
         'id_status'=>$request->id_status,
         'nama_pengambil'=>$request->nama_pengambil,
         'tgl_keluar'=>$request->tgl_keluar,

      ];

      $data = Aduan::where('id',$id)->first();
      $update = $data->update($input);
      return response()->json($update);
   } 
}
