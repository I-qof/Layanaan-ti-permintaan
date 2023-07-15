<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StatusController extends Controller
{
    public function index()
    {
       $data = DB::connection('mysql')->select("SELECT * FROM status where deleted = 1");
       return DataTables::of($data)->make(true);
    }
 
    public function view(){
      return view('views.masterData.status');
   }
 
    public function store(Request $request)
    {
       $this->validate($request, [
          'nama_status' => 'required',
          'color' => 'required',
   
       ]);
 
       $input = [
          'nama_status' => $request->nama_status,
          'color' => $request->color,
       
 
       ];
 
       $data = Status::create($input);
       return response()->json($data);
    }
 
 
    public function getById($id)
    {
       $data = DB::connection('mysql')->select("SELECT * FROM status where deleted =1 and id = $id");
       return response()->json(['data' => $data]);
    }
 
    public function destroy($id)
    {
       $data = Status::where('id', $id)->update([
          'deleted' => 0
       ]);
       return response()->json($data);
    }
 
    public function update($id,Request $request){
       $this->validate($request, [
          'nama_status' => 'required',
          'color' => 'required',
          
       ]);
 
       $input = [
          'nama_status' => $request->nama_status,
          'color' => $request->color,
        
 
       ];
 
       $data = Status::where('id',$id)->update($input);
       return response()->json($data);
 
    }
}
