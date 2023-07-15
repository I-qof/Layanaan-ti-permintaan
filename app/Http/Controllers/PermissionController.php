<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{

    // function __construct()

    // {
    //     $this->middleware('permission:permission-create', ['only' => ['store']]);
    //     $this->middleware('permission:permission-read', ['only' => ['get', 'getById', 'index']]);
    //     $this->middleware('permission:permission-update', ['only' => ['update']]);
    //     $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    // }

    public function view()
    {
        return view('views.user.permission');
    }

    public function index(Request $request)
    {
        $data = Permission::orderBy('id', 'DESC')->get();

        $datajson =  json_decode($data);
        return response()->json($data);


        //bila datanya ingin dicari
        // if ($request->has('q')) {
        //     $cari = $request->q;
        //     $data = DB::connection('sqlsrv_prod')->select("SELECT name
        //                                                  FROM permissions
        //                                                  WHERE name LIKE '%$cari%' ");
        //     return response()->json($data);
        // }
    }

    public function get()
    {
        $data = Permission::orderBy('id', 'DESC')->get();
        return DataTables::of($data)->make(true);
    }


    public function store(Request $request)
    {
        $model = new Permission;
        if ($request->id != 0 && Permission::find($request->id) != null) {
            $model = Permission::find($request->id);
        }

        $model->name = $request->name;
        $model->save();

        return response()->json(['success' => 'Data berhasil ditambah']);
    }

    public function destroy($id)
    {
        Permission::find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function getById($id)
    {
        $permis = Permission::where('id', $id)->first();
        return response()->json(['data' => $permis]);
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required'
        // ]);

        $input = $request->all();

        $update = [
            'name' => $request->name
        ];

        Permission::where('id', $id)->update($update);
        return response()->json(['success' => 'Data berhasil diedit']);
    }
}
