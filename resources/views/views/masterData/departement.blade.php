@extends('includes.main')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Departement</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tabel-main" class="table">
                            <thead>
                                <tr>
                                    <th><button class="btn btn-success" id="openModal">Tambah Data</button></th>
                                    <th>Nama Departement</th>
                                    <th>Saldo</th>
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
                    <h5 class="modal-title" id="modalAddLabel">Departement</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Inventaris</label>
                            <input type="text" id="id" hidden name="id">
                            <input type="text" class="form-control" name="nama_departement" id="nama_departement" placeholder="Nama Departement">
                        </div>
                       
                        <div class="form-group">
                            <label for="Inventaris">Saldo</label>
                            <input type="text" class="form-control" name="saldo" id="saldo" placeholder="Isi saldo">
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
    {{-- <script src="{{ URL::asset('assets/js/data-table.js') }}"></script> --}}
    <script src="{{ URL::asset('js/departement.js') }}" type="text/javascript"></script>

@endpush
