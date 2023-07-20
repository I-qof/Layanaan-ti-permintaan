@extends('includes.main')
@push('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-2">
                <div class="card-body">
                    <div class="container-fluid">
                        <input type="text" hidden id="no_aduan" name="no_aduan" value="{{ $data->no_aduan }}">
                        <h3 class="text-right my-5">No.Aduan &nbsp;&nbsp;#{{ $data->no_aduan }}</h3>
                        <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <input type="text" value="{{ $data->id }}"hidden name="idAduan" id="idAduan">
                            <p class="mt-5"><b>Deskripsi Pengguna</b></p>
                            <p>Nama Pengguna : {{ $data->name }}</p>
                            <p>Email Pengguna : {{ $data->email }}</p>
                            <p>No_hp : {{ $data->no_hp }}</p>
                            <p>Lokasi : {{ $data->lokasi }}</p>
                        </div>
                        <div class="col-lg-3 ps-0">
                            <p class="mt-5"><b>Deskripsi Tanggal</b></p>
                            <p>Tanggal Masuk : {{ $data->tgl_masuk }}</p>
                            <p>Tanggal Keluar : {{ $data->tgl_keluar }}</p>
                            <p>Nama pengambil : {{ $data->nama_pengambil }}</p>
                        </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pr-0">
                            <p class="mt-5 mb-2 text-right"><b>Deskripsi Aduan</b></p>
                            <p>Email Atasan : {{ $data->email_atasan }}</p>
                            <p>Status : {{ $data->nama_status }}</p>
                            <p>Status Approve : {{ $data->approve_status == 2 ? 'APPROVED' : 'OPEN' }}</p>
                            <p>Keluhan : {{ $data->keluhan }}</p>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table id="tabel-main" class="table">
                                <thead>
                                    <tr class="bg-dark text-white">

                                        </th>
                                        <th>Jenis Brang</th>
                                        <th>Deskripsi</th>
                                        <th>Stock</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        {{-- <p class="text-right mb-2">Total Aduan: $12,348</p>
                  <p class="text-right">vat (10%) : $138</p> --}}
                        <h4 class="text-right mb-5">Total Pekerjaan : {{ $total }}</h4>
                        <hr>
                    </div>
                    <div class="container-fluid w-100">
                        <a href="#" class="btn btn-primary float-right mt-4 ms-2 print"><i
                                class="ti-printer me-1"></i>Print</a>
                        @can('permintaan-tindak-lanjut', Permintaan::class)
                            <a class="btn btn-warning float-right mt-4 tindakLanjut"><i class="ti-export me-1"></i>Tindak Lanjut
                            </a>
                            <a class="btn btn-info float-right mt-4 btnAmbil"><i class="ti-export me-1"></i>Ambil Barang
                            </a>
                        @endcan
                        @can('permintaan-approve', Permintaan::class)
                            <a class="btn btn-success float-right mt-4 approve"
                                style="display: {{ $data->approve_status == 2 ? 'none' : '' }}"><i
                                    class="ti-export me-1"></i>Approve
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAddBeli" tabindex="-1" role="dialog" aria-labelledby="modalAddBeliLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddBeliLabel">Tindak Lanjut Pembelian</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDataBeli" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">URL Pembelian</label>
                            <input type="text" id="id_desc_permintaan" hidden name="id_desc_permintaan">
                            <input type="text" class="form-control" name="url_pembelian" id="url_pembelian">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Inventaris</label>
                           
                            <select name="no_inventaris" id="no_inventaris" class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Inventaris --</option>
                                @foreach ($inventaris as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_inventaris }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pembayaran</label>
                            <select name="status_pembayaran" id="status_pembayaran" class="js-example-basic-single w-100">
                                <option value="">-- Pilih Status Pembayaran --</option>

                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Beli</label>
                            <input type="number" class="form-control" name="harga_beli" id="harga_beli">
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
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tindak Lanjut Permintaan</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Deskripsi</label>
                            <input type="text" id="id_inventaris_pemakai" hidden name="id_inventaris_pemakai">
                            <input type="text" id="id" hidden name="id">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Diagnosa</label>
                            <input type="text" class="form-control" name="diagnosa" id="diagnosa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tindakan</label>
                            <input type="text" class="form-control" name="tindakan" id="tindakan">
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="id_status" id="id_status" class="js-example-basic-single w-100"
                                        required>
                                        <option value="">-- Pilih Status --</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">sperpat</label>
                                    <select name="id_inventaris" id="id_inventaris"
                                        class="js-example-basic-single w-100">
                                        <option value="">-- Pilih Nomor sperpat --</option>
                                        @foreach ($inventaris as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_inventaris }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
    <div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="modalStatusLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStatusLabel">Tindak Lanjut Permintaan</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDataStatus" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Status deskripsi</label>
                            <input type="text" id="id" hidden name="id">

                            <select name="id_status_deskripsi" id="id_status_deskripsi"
                                class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status QC</label>
                            <select name="id_status_qc" id="id_status_qc" class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Penyelesaian</label>

                            <select name="id_status_penyelesaian" id="id_status_penyelesaian"
                                class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="id_status1" id="id_status1" class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Status --</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                @endforeach
                            </select>
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
    <div class="modal fade" id="modalTindakLanjut" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tindak Lanjut Permintaan</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDataTindakLanjut" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="id_status" id="id_statusT" class="js-example-basic-single w-100" required>
                                @if (empty($data->id_status))
                                    <option value="">-- Pilih Status --</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                    @endforeach
                                @else
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, [$data->id_status])) selected @endif>{{ $item->nama_status }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Pengambil</label>
                            <input type="text" id="nama_pengambil" class="form-control" name="nama_pengambil"
                                value="{{ $data->nama_pengambil }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Keluar</label>
                            <input type="datetime-local" class="form-control" name="tgl_keluar" id="tgl_keluar"
                                value="{{ $data->tgl_keluar }}">
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
    <script src="{{ URL::asset('js/permintaanEdit.js') }}" type="text/javascript"></script>
@endpush
