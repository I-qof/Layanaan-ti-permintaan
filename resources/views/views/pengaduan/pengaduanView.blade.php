<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Layanaan TI - PT.Pupuk Sriwijaya Palembang</title>
    <link href="{{ URL::asset('assetsProfil/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="layoutDefault">
        <div id="layoutDefault_content">
            <main>
                <!-- Navbar-->
                <nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                    <div class="container px-5">
                        <img src="{{ URL::asset('assets/images/pusri_col.png') }}" style="width: 200px;height: 50px;"
                            alt="">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto me-lg-5">
                                <li class="nav-item"><a class="nav-link " href="{{ url('/') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link active"
                                        href="{{ url('/view/aduan') }}">Aduan</a></li>
                                {{-- <li class="nav-item"><a class="nav-link "
                                        href="{{ url('/view/permintaan') }}">Permintaan</a></li> --}}

                            </ul>
                            <a class="btn fw-500 ms-lg-4 btn-primary" href="{{ url('/login') }}">
                                Login
                                <i class="ms-2" data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <!-- Page Header-->
                <header class="page-header-ui page-header-ui-light bg-white">
                    <div class="page-header-ui-content">
                        <div class="container px-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-xl-8 col-lg-10 text-center mb-4" data-aos="fade">
                                    <h1 class="page-header-ui-title">Selamat Datang Dilayanaan Pengaduan</h1>
                                    <p class="page-header-ui-text">Silahkan Lakukan tracking pengaduan anda</p>
                                    <div class="row justify-content-center">
                                        <div class="input-group w-75 ">

                                            <input type="text" id="inp_cari" name="inp_cari"
                                                class="form-control mr-3 text-center"
                                                placeholder="Silahkan masukkan nomor tiket anda">


                                            <a class="btn btn-primary fw-500 me-2" id="cari"><i
                                                    class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="btn btn-outline-green fw-500 me-2 mt-4" id="tambah"
                                        href="{{ URL::to('/aduan/add') }}">Tambah Aduan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-light">

                    </div>
                </header>

            </main>
        </div>
        <div id="layoutDefault_footer">
            <footer class="footer pt-5 pb-5 mt-auto bg-dark footer-dark">
                <div class="container">
                    
                    <div class="row  align-items-center">
                        <div class="col-md-6 small">Copyright © 2023, Layanaan-TI. All rights reserved.</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="modalHasil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DESKRIPSI ADUAN</h5>
                    <button type="button" class="btn cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" data-aos="fade-right">
                        <div class="row g-0">
                            {{-- <div class="col-md-4">
                                <img class="img-fluid" src="https://source.unsplash.com/6LBBOwkPzyQ/800x550" alt="...">
                            </div> --}}
                            <div class="col-md-12">
                                <div class="card-body d-flex h-100 flex-column">
                                    <h3 class="card-title fw-bold text-uppercase mb-2">Deskripsi Aduan</h3>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><strong>No Aduan:</strong> <span id="no_aduan">--</span></p>
                                            <p><strong>Email:</strong> <span id="email">--</span></p>
                                            <p><strong>Keluhan:</strong> <span id="keluhan">--</span></p>
                                            <p><strong>No HP:</strong> <span id="no_hp">--</span></p>
                                            <p><strong>Lokasi:</strong> <span id="lokasi">--</span></p>
                                            <p><strong>Email Atasan:</strong> <span id="email_atasan">--</span></p>
                                        </div>
                                        <div class="col-6">
                                            <p><strong>Tanggal Masuk:</strong> <span id="tgl_masuk">--</span></p>
                                            <p><strong>Tanggal Keluar:</strong> <span id="tgl_keluar">--</span></p>
                                            <p><strong>Nama Status:</strong> <span id="nama_status">--</span></p>
                                            <p><strong>Nama Pengambil:</strong> <span id="nama_pengambil">--</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success print"><i class="la la-print"></i>Print</button>
                    <button type="button" class="btn btn-danger close" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    <div class="modal fade" id="modalHasilFailed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hasil Tidak Ditemukan!</h5>
                    <button type="button" class="btn cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container px-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="img-fluid p-4"
                                        src="{{ URL::asset('/assetsProfil/assets/img/illustrations/404-error.svg') }}"
                                        alt="..." />
                                    <p class="lead">Data aduan ini tidak ditemukan didalam system.</p>
                                    {{-- <a class="text-arrow-icon" href="index.html">
                                        <i class="ms-0 me-1" data-feather="arrow-left"></i>
                                        Return Home
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger close" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var APP_URL = "{{ env('APP_URL') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('assetsProfil/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL::asset('js/pengaduanView.js') }}" type="text/javascript"></script>

    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true,
        });
    </script>
</body>

</html>
