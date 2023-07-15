<?php

namespace App\Http\Controllers;

use App\Models\DescPermintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DescPermintaanController extends Controller
{
   public function index()
   {
      $data = DescPermintaan::select('desc_permintaan.*','jenis_barang.nama_jenis')
      ->leftJoin('jenis_barang', 'desc_permintaan.id_jenis_barang', '=', 'jenis_barang.id')
      ->where('desc_permintaan.deleted', 1)->get();
      return DataTables::of($data)->make(true);
   }

   public function get($no_aduan)
   {
      $data = DescPermintaan::select('desc_permintaan.*', 'status.nama_status', 'status.color', 'users.name as name')
         ->leftJoin('status', 'desc_permintaan.id_status', '=', 'status.id')
         ->leftJoin('users', 'desc_permintaan.id_teknisi', '=', 'users.id')
         ->where('desc_permintaan.deleted', 1)
         ->where('desc_permintaan.no_aduan', $no_aduan)
         ->orderByDesc('desc_permintaan.id') // Mengurutkan berdasarkan id secara descending
         ->get();
      return DataTables::of($data)->make(true);
   }

   public function view()
   {
      return view('views.permintaan.permintaan');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'id_jenis_barang' => 'required',
         'deskripsi' => 'required',
         'no_aduan' => 'required',
      ]);

      $input = [
         'id_jenis_barang' => $request->id_jenis_barang,
         'deskripsi' => $request->deskripsi,
         'no_aduan' => $request->no_aduan,
      ];

      $data = DescPermintaan::create($input);
      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DescPermintaan::where('id', $id)->first();
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = DescPermintaan::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      if ($request->id_jenis_barang) {
         $input = [
            'id_jenis_barang' => $request->id_jenis_barang,
            'deskripsi' => $request->deskripsi,
            'no_aduan' => $request->no_aduan,
         ];
      } else {
         $input = [
            'id_inventaris' => $request->id_inventaris,
            'diagnosa' => $request->diagnosa,
            'deskripsi' => $request->deskripsi,
            'id_status_deskripsi' => $request->id_status_deskripsi,
            'id_status_qc' => $request->id_status_qc,
            'id_status_penyelesaian' => $request->id_status_penyelesaian,
            'id_teknisi' => $request->id_teknisi,
            'stock_status' => $request->stock_status,
            'pembelian_status' => $request->pembelian_status,
            'id_jenis_barang' => $request->id_jenis_barang,
            'id_status' => $request->id_status,
            'tindakan' => $request->tindakan,
         ];
      }

     
      $data = DescPermintaan::where('id', $id)->update($input);
      return response()->json($data);
   }
}
