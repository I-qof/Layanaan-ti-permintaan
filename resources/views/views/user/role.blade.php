@extends('includes.main')

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Role</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="tabel-main" class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><button class="btn btn-outline-success" id="openModal">Tambah
                                            Data</button></th>
                                    <th class="text-center" style="width:35%">Nama Role</th>
                                    <th  style="width:25%">Permission</th>
                                    <th class="text-center" style="width:15%">Action</th>
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
    <div class="modal fade" id="modalAdd"  role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Modal title</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf 
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Role</label>
                            <input type="text" id="id" hidden name="id">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Permission</label>
                            <select class="js-example-basic-multiple w-100 permission" name="permission[]" id="permission" multiple="multiple"
                                style="width:100%"></select>
                                
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
    <script src="{{ URL::asset('assets/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ URL::asset('js/role.js') }}" type="text/javascript"></script>
@endpush
