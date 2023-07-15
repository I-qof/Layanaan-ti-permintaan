<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class InventarisController extends Controller
{
    public function index()
   {
      $data = DB::connection('mysql')->select("SELECT * FROM inventaris where deleted = 1");
      return DataTables::of($data)->make(true);
   }

   public function view(){
      $jenis = Jenis_barang::where('deleted',1)->get();
      return view('views.masterData.inventaris',[
         'jenis'=>$jenis
      ]);
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'nama_inventaris' => 'required',
         'id_jenis' => 'required',
         // 'id_user_pemakai' => 'required',
         'no_inventaris' => 'required',
         'deskripsi' => 'required',
         // 'status_pemakaian' => 'required',
         
      ]);

      $input = [
         'nama_inventaris' => $request->nama_inventaris,
         'id_jenis' => $request->id_jenis,
         'id_user_pemakai' => $request->id_user_pemakai,
         'no_inventaris' => $request->no_inventaris,
         'deskripsi' => $request->deskripsi,
         // 'status_pemakaian' => $request->status_pemakaian,
        
      ];

      $data = Inventaris::create($input);
      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DB::connection('mysql')->select("SELECT * FROM inventaris where deleted =1 and id = $id");
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = Inventaris::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id,Request $request){
      $this->validate($request, [
         'nama_inventaris' => 'required',
         'id_jenis' => 'required',
         // 'id_user_pemakai' => 'required',
         'no_inventaris' => 'required',
         'deskripsi' => 'required',
         // 'status_pemakaian' => 'required',
         
      ]);

      $input = [
         'nama_inventaris' => $request->nama_inventaris,
         'id_jenis' => $request->id_jenis,
         'id_user_pemakai' => $request->id_user_pemakai,
         'no_inventaris' => $request->no_inventaris,
         'deskripsi' => $request->deskripsi,
         // 'status_pemakaian' => $request->status_pemakaian,
        
      ];

      $data = Inventaris::where('id',$id)->update($input);
      return response()->json($data);

   }
}
