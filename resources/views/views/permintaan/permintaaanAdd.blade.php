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
                                    <label>Nama Pengguna</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder=""
                                        disabled value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="test" id="no_aduan" name="no_aduan" class="form-control"
                                        value="{{ $no_aduan }}" hidden>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" required
                                        placeholder="Masukkan nomor handphone anda">
                                </div>
                                <div class="form-group">
                                    <label>lokasi</label>
                                    <input type="text" id="lokasi" name="lokasi" required class="form-control"
                                        placeholder="Masukkan lokasi anda ">
                                </div>
                                <div class="form-group">
                                    <label>Departemen</label>
                                    <select name="departement" id="departement" style="width: 100%">
                                        <option value="">---Silahkan pilih departemen---</option>
                                        <option value="Departemen K3">Departemen K3</option>
                                        <option value="Departemen Keuangan">Departemen Keuangan</option>
                                        <option value="Departemen Pengawasan Keuangan">Departemen Pengawasan Keuangan</option>
                                        <option value="Departemen Pembelajaran & Pengembangan SDM">Departemen Pembelajaran & Pengembangan SDM
                                        </option>
                                        <option value="Departemen Pemasaran">Departemen Pemasaran</option>
                                        <option value="Departemen Penjualan Wilayah 2">Departemen Penjualan Wilayah 2</option>
                                        <option value="Departemen Penjualan Wilayah 3B">Departemen Penjualan Wilayah 3B</option>
                                        <option value="Departemen Produksi">Departemen Produksi</option>
                                        <option value="Departemen Riset dan Pengembangan (R&D)">Departemen Riset dan
                                            Pengembangan (R&D)</option>
                                        <option value="Departemen Operasional">Departemen Operasional</option>
                                        <option value="Departemen Layanan Pelanggan">Departemen Layanan Pelanggan</option>
                                        <option value="Departemen Logistik dan Suplai">Departemen Logistik dan Suplai
                                        </option>
                                        <option value="Departemen Hukum dan Kepatuhan">Departemen Hukum dan Kepatuhan
                                        </option>
                                        <option value="Departemen Kom. Pemasaran & Branding">Departemen Kom. Pemasaran & Branding</option>
                                        <option value="Departemen Pengembangan Bisnis">Departemen Pengembangan Bisnis
                                        </option>
                                        <option value="Departemen Kualitas">Departemen Kualitas</option>
                                        <option value="Departemen Manajemen Proyek">Departemen Manajemen Proyek</option>
                                        <option value="Departemen Pengawasan Operasional">Departemen Pengawasan Operasional</option>
                                        <option value="Departemen Hubungan Kemasyarakatan">Departemen Hubungan Kemasyarakatan</option>
                                        <option value="Departemen Sisman Terpadu & Inovasi">Departemen Sisman Terpadu & Inovasi</option>
                                        <option value="Departemen Tata Kelola & Manajemen Resiko">Departemen Tata Kelola & Manajemen Resiko </option>
                                        <option value="Departemen Mitra Bisnis & Layanan TI">Departemen Mitra Bisnis & Layanan TI</option>
                                        <option value="Departemen Penjamin Kualitas">Departemen Penjamin Kualitas</option>
                                        <option value="Departemen Laboratorium">Departemen Laboratorium</option>
                                        <option value="Departemen Lingkungan Hidup">Departemen Lingkungan Hidup</option>
                                        <option value="Departemen Sarana & Umum">Departemen Sarana & Umum</option>
                                        <option value="Departemen Security">Departemen Security</option>
                                        <option value="Departemen Akuntansi">Departemen Akuntansi</option>
                                        <option value="Departemen Mitra Bisnis Pemasaran">Departemen Mitra Bisnis Pemasaran</option>
                                        <option value="Departemen Pemasaran Aset">Departemen Pemasaran Aset</option>
                                        <option value="Departemen Adm. Umum Aset">Departemen Adm. Umum Aset</option>
                                        <option value="Departemen Perencanaan & Pengendalian Aset">Departemen Perencanaan & Pengendalian Aset</option>
                                        <option value="Departemen Organisasi & Manajemen Talenta">Departemen Organisasi & Manajemen Talenta</option>
                                        <option value="Departemen Remunerasi & Hub. Industrial">Departemen Remunerasi & Hub. Industrial</option>
                                    </select>
                                </div>

                            </section>
                            <h3>Permintaan</h3>
                            <section>
                                <h3>Permintaan</h3>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Email Atasan</label>
                                        <input type="email" id="email_atasan" name="email_atasan" required
                                            class="form-control" placeholder="Masukkan email atasan anda ">
                                    </div>
                                    <label>Alasan Permintaan</label>

                                    <textarea type="text" class="form-control w-100" style="width: 100%;resize: vertical;" id="alasan_permintaan"
                                        required name="alasan_permintaan" style="width: 100%" aria-describedby="text"
                                        placeholder="Masukkan alasan permintaan anda"></textarea>
                                </div>

                            </section>
                            <h3>Detail Permintaan</h3>
                            <section>
                                <h3>Detail Permintaan</h3>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabel-main" class="table">
                                                <thead>
                                                    <tr>
                                                        <th><button class="btn btn-outline-success" id="openModal">Tambah
                                                                Data</button>
                                                        </th>
                                                        <th>Jenis Permintaan</th>
                                                        <th>Deskripsi</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </section>

                            {{-- <h3>Selesai</h3>
                            <section>
                                <h3>Selesai</h3>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Saya setuju dengan Syarat dan Ketentuan.
                                    </label>
                                </div>
                            </section> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tambah data Pemmintaan</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Barang</label>
                            <input type="test" id="no_aduan" name="no_aduan" class="form-control"
                                value="{{ $no_aduan }}" hidden required>
                            <select name="id_jenis_barang" id="id_jenis_barang" class="js-example-basic-single w-100"
                                required>
                                <option value="">-- Pilih Jenis Barang</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Deskripsi Barang</label>
                            <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" required
                                placeholder="Harap Isikan Spesifikasi Permintaaan deskripsi" style="width: 100%;resize: vertical;"
                                rows="4"></textarea>
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
    <script src="{{ URL::asset('js/permintaanAdd.js') }}" type="text/javascript"></script>
@endpush
