<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    // function __construct()

    // {
    //     $this->middleware('permission:role-create', ['only' => ['store']]);
    //     $this->middleware('permission:role-read', ['only' => ['get', 'getById']]);
    //     $this->middleware('permission:role-update', ['only' => ['update']]);
    //     $this->middleware('permission:role-delete', ['only' => ['delete']]);
    // }

    public function view()
    {
        return view('views.user.role');
    }

    public function get()
    {
        $roles = Role::with(['permissions' => function ($query) {
            $query->orderBy('name', 'ASC');
        }])->orderBy('name', 'ASC')->get();
        return DataTables::of($roles)->make(true);
        // return response()->json($roles);
    }

    public function getById($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();
        if ($role) {

            return response()->json(['success' => 'Data tersedia', $role]);
        } else {
            return response()->json(['error' => 'Data Tidak tersedia']);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->permission);

        return response()->json(['success' => 'Data Berhasil Disimpan']);
    }

    public function delete($id)
    {
        $role = Role::find($id)->delete();
        // $role->delete();
        return response()->json(['suksess' => 'Data Berhasil Dihapus']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        return response()->json(['success' => 'Data Berhasil Diubah']);
    }
}
