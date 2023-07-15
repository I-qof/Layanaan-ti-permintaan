<!doctype html>
<html lang="en">

<head>
    <title>Layanaan-Ti | PT. Pusri Palembang</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Layannan Pengaduan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Layanaan">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/jquery-toast-plugin/jquery.toast.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">


    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />


</head>

<body class="sidebar-mini">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">

            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Halo, <span class="text-black fw-bold"></span>
                        </h1>
                        <h3 class="welcome-sub-text">Selamat datang kembali, mari buat aduan kamu! </h3>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Silahkan Tambahkan Aduan</h4>
                                    <form id="example-form" action="#">
                                        <div class="justify-content-center align-items-lg-center items-center">
                                            <h3>Akun</h3>
                                            <section>
                                                <h3>Akun</h3>
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="test" id="no_aduan" name="no_aduan"
                                                        class="form-control" value="{{ $no_aduan }}" hidden>
                                                    <input type="email" id="email" name="email" required
                                                        class="form-control" aria-describedby="emailHelp"
                                                        placeholder="Masukkan Email Anda">
                                                    <small id="emailHelp" class="form-text text-muted">Masukkan Email
                                                        Anda</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor HP</label>
                                                    <input type="text" id="no_hp" name="no_hp"
                                                        class="form-control" required
                                                        placeholder="Masukkan nomor handphone anda">
                                                </div>
                                                <div class="form-group">
                                                    <label>lokasi</label>
                                                    <input type="text" id="lokasi" name="lokasi" required
                                                        class="form-control" placeholder="Masukkan lokasi anda ">
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
                                                                        <th><button class="btn btn-outline-success"
                                                                                id="openModal">Tambah Data</button>
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

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">PT.PUPUK SRIWIJAYA
                            PALEMBANG </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023,
                            Layanaan-TI. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Tambah data Kerusakan</h5>
                    <button class="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Inventaris</label>
                            <input type="test" id="no_aduan" name="no_aduan" class="form-control"
                                value="{{ $no_aduan }}" hidden required>
                            <select name="id_inventaris" id="id_inventaris" class="js-example-basic-single w-100" required>
                                <option value="">-- Pilih Nomor Inventaris</option>
                                @foreach ($inventaris as $item)
                                    <option value="{{ $item->id }}">{{ $item->no_inventaris }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Kerusakan</label>
                            <input type="text" class="form-control" name="kerusakan" id="kerusakan" required
                                placeholder="Kerusakan">
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

    <!-- Javascript -->
    <script>
        var APP_URL = "{{ env('APP_URL') }}";
    </script>
    <!-- plugins:js -->
    <script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ URL::asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('assets/js/template.js') }}"></script>
    <script src="{{ URL::asset('assets/js/settings.js') }}"></script>
    <script src="{{ URL::asset('assets/js/todolist.js') }}"></script>

    <script src="{{ URL::asset('assets/vendors/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/wizard.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/select2/select2.min.js') }}"></script>
    
        <script src="{{ URL::asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    
    <!-- endinject -->
    <!-- Custom js for this page-->
    {{-- 
        <script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
        <script src="{{ URL::asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
        
        --}}
    {{-- <script src="{{ URL::asset('assets/js/data-table.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('js/aduan.js') }}" type="text/javascript"></script> --}}
    <!-- End custom js for this page-->
    
    
    
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/pengaduanAdd.js') }}" type="text/javascript"></script>



</body>

</html>
