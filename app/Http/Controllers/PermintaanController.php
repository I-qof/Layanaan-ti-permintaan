<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis_barang;
use App\Models\Permintaan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PermintaanController extends Controller
{
    public function index()
   {
      $data = Permintaan::select('permintaan.*','users.name as name','status.nama_status')
      ->leftJoin('status', 'permintaan.id_status', '=', 'status.id')
      ->leftJoin('users', 'permintaan.id_user', '=', 'users.id')
      ->where('permintaan.deleted',1)->orderBy('permintaan.id','DESC')->get();
      return DataTables::of($data)->make(true);
   }

   public function view(){
      return view('views.permintaan.permintaan');
   }

   public function viewPermintaan(){
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
         'tgl_masuk' => New DateTime,
         'lokasi' => $request->lokasi,
         'email_atasan' => $request->email_atasan,
         'id_status' => 1,
         // 'nama_pengambil' => $request->nama_pengambil,

      ];

      $data = Permintaan::create($input);
      // $dataEmail = [$request->email, $request->email_atasan];
      // $dataAduan = Permintaan::rightJoin('status', 'permintaan.id_status', '=', 'status.id')->where('permintaan.no_aduan', $request->no_aduan)->where('permintaan.deleted', 1)->first();
      // // dd($dataAduan);
      // try {
      //    foreach ($dataEmail as $key => $value) {
            
      //       $this->sendMail($value,$dataAduan);
      //    }
      // } catch (\Throwable $th) {
      //    dd($th);
      // }
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

   public function update($id,Request $request){
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

      $data = Permintaan::where('id',$id)->update($input);
      return response()->json($data);

   }
   public function sendMail($email,$data)
   {
      // dd($data);
      $mailData = [
         'alasan_permintaan' => $data->alasan_permintaan,
         'no_aduan' => $data->no_aduan,
         'no_hp' => $data->no_hp,
         'lokasi' => $data->lokasi,
         'email' => $data->email,
         'email_atasan' => $data->email_atasan,
        
      ];

      Mail::to($email)->send(new AppAduan($mailData));
   }  
}
