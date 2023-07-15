<?php

namespace App\Http\Controllers;

use App\Models\BarangPakaiPermintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BarangPakaiPermintaanController extends Controller
{
    public function index()
    {
       $data = DB::connection('mysql')->select("SELECT * FROM aduan where deleted = 1");
       return DataTables::of($data)->make(true);
    }
 
    public function view(){
      return view('views.pengaduan.pengaduan');
   }
 
    public function store(Request $request)
    {
       $this->validate($request, [
          'id_inventaris' => 'required',
          'id_desc_permintaan' => 'required',
        
       ]);
 
       $input = [
          'id_inventaris' => $request->id_user,
          'id_desc_permintaan' => $request->keluhan,
      
 
       ];
 
       $data = BarangPakaiAduan::create($input);
       return response()->json($data);
    }
 
 
    public function getById($id)
    {
       $data = DB::connection('mysql')->select("SELECT * FROM aduan where deleted =1 and id = $id");
       return response()->json(['data' => $data]);
    }
 
    public function destroy($id)
    {
       $data = BarangPakaiAduan::where('id', $id)->update([
          'deleted' => 0
       ]);
       return response()->json($data);
    }
 
    public function update($id,Request $request){
       $this->validate($request, [
          'id_inventaris' => 'required',
          'id_desc_permintaan' => 'required',
         
       ]);
 
       $input = [
          'id_inventaris' => $request->id_user,
          'id_desc_permintaan' => $request->keluhan,
         
 
       ];
 
       $data = BarangPakaiAduan::where('id',$id)->update($input);
       return response()->json($data);
 
    }
}
