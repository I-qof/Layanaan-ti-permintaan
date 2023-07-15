<?php

namespace App\Http\Controllers;

use App\Models\DescAduan;
use App\Models\Inventaris;
use App\Models\Sperpat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DescAduanController extends Controller
{
   public function index()
   {
      $data = DescAduan::where('deleted', 1)->get();
      return DataTables::of($data)->make(true);
   }

   public function get($no_aduan)
   {
      $data = DescAduan::select('desc_aduan.*', 'status.nama_status', 'status.color', 'users.name as name')
         ->leftJoin('status', 'desc_aduan.id_status', '=', 'status.id')
         ->leftJoin('users', 'desc_aduan.id_teknisi', '=', 'users.id')
         ->where('desc_aduan.deleted', 1)
         ->where('desc_aduan.no_aduan', $no_aduan)
         ->orderByDesc('desc_aduan.id') // Mengurutkan berdasarkan id secara descending
         ->get();
      return DataTables::of($data)->make(true);
   }

   public function view()
   {
      return view('views.pengaduan.pengaduan');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'id_inventaris' => 'required',
         'kerusakan' => 'required',
         'no_aduan' => 'required',
      ]);

      $input = [
         'id_inventaris' => $request->id_inventaris,
         'kerusakan' => $request->kerusakan,
         'no_aduan' => $request->no_aduan,

      ];

      if ($request->id_inventaris) {
         $dataInv = Inventaris::where('id', $request->id_inventaris)->update([
            'status_pemakaian' => 2
         ]);
      }

      $data = DescAduan::create($input);
      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DescAduan::where('id', $id)->first();
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = DescAduan::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      $this->validate($request, [
         // 'deskripsi' => 'required',
         // 'diagnosa' => 'required',
         // 'tindakan' => 'required',
         // 'id_status' => 'required',
         // 'id_sperpat' => 'required',
      ]);

      if ($request->id_inventaris) {
         $input = [
            'id_inventaris' => $request->id_inventaris,
            'kerusakan' => $request->kerusakan,
            'no_aduan' => $request->no_aduan,
         ];
      } else {
         $input = [
            'deskripsi' => $request->deskripsi,
            'diagnosa' => $request->diagnosa,
            'tindakan' => $request->tindakan,
            'id_status' => $request->id_status,
            'id_sperpat' => $request->id_sperpat,
         ];
      }

      if ($request->id_sperpat) {
         $dataInv = Sperpat::where('id', $request->id_sperpat)->update([
            'status_pemakaian' => 2,
            'id_inventaris_pemakai' => $request->id_inventaris_pemakai,
            'id_user_pemakai' => Auth::user()->id
         ]);
      }
      $data = DescAduan::where('id', $id)->update($input);
      return response()->json($data);
   }
}
