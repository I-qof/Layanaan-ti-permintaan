@extends('includes.main')
@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Silahkan Tambahkan Permintaan</h4>
                    <form id="example-form" action="#">
                        <div class="justify-content-center align-items-lg-center items-center">
                            <h3>Akun</h3>
                            <section>
                                <h3>Akun</h3>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="test" id="no_aduan" name="no_aduan" class="form-control"
                                        value="{{ $no_aduan }}" hidden>
                                    <input type="email" id="email" name="email" required class="form-control"
                                        aria-describedby="emailHelp" placeholder="Masukkan Email Anda">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Email
                                        Anda</small>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" required
                                        placeholder="Masukkan nomor handphone anda">
                                </div>
                                <div class="form-group">
                                    <label>lokasi</label>
                                    <input type="text" id="lokasi" name="lokasi" required class="form-control"
                                        placeholder="Masukkan lokasi anda ">
                                </div>
                            </section>
                            <h3>Keluhan</h3>
                            <section>
                                <h3>keluhan</h3>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Email Atasan</label>
                                        <input type="email" id="email_atasan" name="email_atasan" required
                                            class="form-control" placeholder="Masukkan email atasan anda ">
                                    </div>
                                    <label>Deskripsi Keluhan</label>

                                    <textarea type="text" class="form-control w-100" id="keluhan" required name="keluhan" style="width: 100%"
                                        aria-describedby="text" placeholder="Masukkan deskripsi keluhan anda"></textarea>
                                </div>

                            </section>
                            <h3>Pekerjaan</h3>
                            <section>
                                <h3>Pekerjaan</h3>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabel-main" class="table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-outline-success" id="openModal">Tambah
                                                                Data</button>
                                                        </th>
                                                        <th>No Inventaris</th>
                                                        <th>Kerusakan</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </section>

                            <h3>Selesai</h3>
                            <section>
                                <h3>Selesai</h3>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Saya setuju dengan Syarat dan Ketentuan.
                                    </label>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/permintaanAdd.js') }}" type="text/javascript"></script>
@endpush
