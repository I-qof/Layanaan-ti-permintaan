<?php

namespace App\Http\Controllers;

use App\Models\Jenis_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JenisBarangController extends Controller
{
   public function index()
   {
      $data = DB::table('jenis_barang')
            ->leftJoin('inventaris', 'jenis_barang.id', '=', 'inventaris.id_jenis')
            ->select('jenis_barang.id', 'jenis_barang.nama_jenis', DB::raw('COUNT(inventaris.id) AS jumlah_stok'))
            ->where('jenis_barang.deleted', '=', 1)
            ->groupBy('jenis_barang.id', 'jenis_barang.nama_jenis')
            ->get();
      return DataTables::of($data)->make(true);
   }

   public function view()
   {
      return view('views.masterData.jenisBarang');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'nama_jenis' => 'required',
      ]);

      $input = [
         'nama_jenis' => $request->nama_jenis,
      ];

      $data = Jenis_barang::create($input);
      return response()->json($data);
   }


   public function getById($id)
   {
      $data = DB::connection('mysql')->select("SELECT * FROM jenis_barang where deleted =1 and id = $id");
      return response()->json(['data' => $data]);
   }

   public function destroy($id)
   {
      $data = Jenis_barang::where('id', $id)->update([
         'deleted' => 0
      ]);
      return response()->json($data);
   }

   public function update($id, Request $request)
   {
      $this->validate($request, [
         'nama_jenis' => 'required',
      ]);

      $input = [
         'nama_jenis' => $request->nama_jenis,
      ];

      $data = Jenis_barang::where('id', $id)->update($input);
      return response()->json($data);
   }
}
