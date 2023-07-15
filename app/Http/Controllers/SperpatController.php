<?php

namespace App\Http\Controllers;

use App\Models\Jenis_barang;
use App\Models\Sperpat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SperpatController extends Controller
{
    public function index()
    {
       $data = DB::connection('mysql')->select("SELECT * FROM sperpat where deleted = 1");
       return DataTables::of($data)->make(true);
    }
 
    public function view(){
      $jenis = Jenis_barang::where('deleted',1)->get();
      return view('views.masterData.sperpat',[
         'jenis'=>$jenis
      ]);
   }
 
    public function store(Request $request)
    {
       $this->validate($request, [
          'nama_sperpat' => 'required',
          'id_jenis' => 'required',
          'no_inventaris' => 'required',
         //  'id_user_pemakai' => 'required',
          'deskripsi' => 'required',
         //  'status_pemakaian' => 'required',
       ]);
 
       $input = [
          'nama_sperpat' => $request->nama_sperpat,
          'id_jenis' => $request->id_jenis,
          'no_inventaris' => $request->no_inventaris,
          'id_user_pemakai' => $request->id_user_pemakai,
          'deskripsi' => $request->deskripsi,
          'status_pemakaian' => $request->status_pemakaian,
          
 
       ];
 
       $data = Sperpat::create($input);
       return response()->json($data);
    }
 
 
    public function getById($id)
    {
       $data = DB::connection('mysql')->select("SELECT * FROM aduan where deleted =1 and id = $id");
       return response()->json(['data' => $data]);
    }
 
    public function destroy($id)
    {
       $data = Sperpat::where('id', $id)->update([
          'deleted' => 0
       ]);
       return response()->json($data);
    }
 
    public function update($id,Request $request){
       $this->validate($request, [
          'nama_sperpat' => 'required',
          'id_jenis' => 'required',
          'no_inventaris' => 'required',
         //  'id_user_pemakai' => 'required',
          'deskripsi' => 'required',
         //  'status_pemakaian' => 'required',
      
       ]);
 
       $input = [
          'nama_sperpat' => $request->nama_sperpat,
          'id_jenis' => $request->id_jenis,
          'no_inventaris' => $request->no_inventaris,
          'id_user_pemakai' => $request->id_user_pemakai,
          'deskripsi' => $request->deskripsi,
          'status_pemakaian' => $request->status_pemakaian,
          
 
       ];
 
       $data = Sperpat::where('id',$id)->update($input);
       return response()->json($data);
 
    }
}
