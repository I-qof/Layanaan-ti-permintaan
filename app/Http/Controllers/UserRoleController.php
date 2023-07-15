<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserRoleController extends Controller
{
    public function view()
    {
        return view('views.user.userrole');
    }
    public function index()
    {
        $data = User::with('roles')->orderBy('id', 'desc')->get();

        return DataTables::of($data)->make(true);
    }
    public function store(Request $request)
    {
        $user = User::where('email', $request->email);
        $user->assignRole($request->input('roles'));
        return response()->json(['success' => 'Data Berhasil Ditambah']);
    }

    public function getById($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = User::where('id', $id)->with('roles.permissions')->first();
        return response()->json(['userrole' => $userRole]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        DB::table('model_has_roles')->where('model_id', $request->id)->delete();

        $user->assignRole($request->input('roles'));

        return response()->json(['success' => 'Data berhasil Diubah']);
    }
}
