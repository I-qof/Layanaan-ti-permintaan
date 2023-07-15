<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DepartementController extends Controller
{
    public function index()
    {
       $data = DB::connection('mysql')->select("SELECT * FROM departement where deleted = 1");
       return DataTables::of($data)->make(true);
    }
 
    public function view()
    {
       return view('views.masterData.departement');
    }
 
    public function store(Request $request)
    {
       $this->validate($request, [
          'nama_departement' => 'required',
       ]);
 
       $input = [
          'nama_departement' => $request->nama_departement,
          'saldo' => $request->saldo,
       ];
 
       $data = Departement::create($input);
       return response()->json($data);
    }
 
 
    public function getById($id)
    {
       $data = Departement::where('deleted',1)->where('id',$id)->first();
       return response()->json(['data' => $data]);
    }
 
    public function destroy($id)
    {
       $data = Departement::where('id', $id)->update([
          'deleted' => 0
       ]);
       return response()->json($data);
    }
 
    public function update($id, Request $request)
    {
       $this->validate($request, [
          'nama_departement' => 'required',
       ]);
 
       $input = [
        'nama_departement' => $request->nama_departement,
        'saldo' => $request->saldo,
       ];
 
       $data = Departement::where('id', $id)->update($input);
       return response()->json($data);
    }
}
