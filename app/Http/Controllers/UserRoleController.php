<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $password = Hash::make($request->password);
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
       
        ];
        $user=User::create($input);

        // $user = User::where('email', $request->email);
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
        $password = Hash::make($request->password);
        $dareq = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ];
        $user = User::find($request->id);
        $user->update($dareq);

        DB::table('model_has_roles')->where('model_id', $request->id)->delete();

        $user->assignRole($request->input('roles'));

        return response()->json(['success' => 'Data berhasil Diubah']);
    }
}
