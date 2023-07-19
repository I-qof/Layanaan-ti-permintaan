<?php

namespace App\Http\Controllers;

use App\Models\DescPembelian;
use Illuminate\Http\Request;

class DescPembelianController extends Controller
{
    public function index()
    {
        $data = DB::connection('mysql')->select("SELECT * FROM desc_pembelian where deleted = 1");
        return DataTables::of($data)->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url_pembelian' => 'required',
            'no_inventaris' => 'required',
            'status_pembayaran' => 'required',
            'harga_beli' => 'required',
            'id_desc_permintaan' => 'required'
        ]);

        $input = [
            'url_pembelian' => $request->url_pembelian,
            'no_inventaris' => $request->no_inventaris,
            'status_pembayaran'=> $request->status_pembayaran,
            'harga_beli'=> $request->harga_beli,
            'id_desc_permintaan'=> $request->id_desc_permintaan
        ];

        $data = DescPembelian::create($input);
        return response()->json($data);
    }


    public function getById($id)
    {
        $data = DescPembelian::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function destroy($id)
    {
        $data = DescPembelian::where('id', $id)->update([
            'deleted' => 0
        ]);
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'url_pembelian' => 'required',
            'no_inventaris' => 'required',
            'status_pembayaran'=> 'required',
            'harga_beli'=> 'required',
            'id_desc_permintaan'=> 'required'
        ]);

        $input = [
            'url_pembelian' => $request->url_pembelian,
            'no_inventaris' => $request->no_inventaris,
            'status_pembayaran'=> $request->status_pembayaran,
            'harga_beli'=> $request->harga_beli,
            'id_desc_permintaan'=> $request->id_desc_permintaan


        ];

        $data = DescPembelian::where('id', $id)->update($input);
        return response()->json($data);
    }
}
