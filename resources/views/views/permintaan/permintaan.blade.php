@extends('includes.main')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Permintaaan Perangkat Komputer</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tabel-main" class="table">
                            <thead>
                                <tr>
                                    <th><a href="{{ url('/permintaan/add') }}" class="btn btn-success">Tambah Data</a></th>
                                    <th>No Permintaan</th>
                                    <th>Nama User</th>
                                    <th>Tgl. Masuk</th>
                                    <th>Tgl. Keluar</th>
                                    <th>No. Hp</th>
                                    <th>Status</th>
                                    <th>Nama Pengambil</th>
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
@endsection

@push('scripts')
    <script src="{{ URL::asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/data-table.js') }}"></script> --}}
    <script src="{{ URL::asset('js/permintaan.js') }}" type="text/javascript"></script>

@endpush
