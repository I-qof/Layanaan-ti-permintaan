@extends('includes.main')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Sperpat</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tabel-main" class="table">
                            <thead>
                                <tr>
                                    <th><button class="btn btn-success" id="openModal">Tambah Data</button></th>
                                    <th>Nama Sperpat</th>
                                    <th>No. Inventaris</th>
                                    <th>Status Pemakaian</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- modal --}}
     <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tambah Data</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Sperpat</label>
                            <input type="text" id="id" hidden name="id">
                            <input type="text" class="form-control" name="nama_sperpat" id="nama_sperpat" placeholder="Nama Sperpat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Barang</label>
                            <select name="id_jenis" id="id_jenis" style="width: 100%">
                                <option value="">-- Pilih Jenis Barang --</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Inventaris">No.Inventaris/ SN</label>
                            <input type="text" class="form-control" name="no_inventaris" id="no_inventaris">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input class="form-control" name="deskripsi" id="deskripsi">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-light cancel" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('js/sperpat.js') }}" type="text/javascript"></script>

@endpush
