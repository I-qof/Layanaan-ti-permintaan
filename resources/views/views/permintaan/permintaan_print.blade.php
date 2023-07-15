<!DOCTYPE html>
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

    <style>
        /* Global Styles */
        body.sidebar-mini {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-scroller {
            padding: 20px;
        }

        /* .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .card-body {
            padding: 20px;
        } */

        .container-fluid {
            margin-bottom: 20px;
        }

        .text-left {
            text-align: left;
        }

        .my-5 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ddd;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .mb-2 {
            margin-bottom: 2px;
        }

        .col-lg-3 {
            width: 25%;
            padding-left: 0;
            padding-right: 0;
        }

        .table {
            width: 100%;
        }

        .bg-dark {
            background-color: #343a40;
        }

        .text-white {
            color: #fff;
        }

        /* Additional Styles */
        h3.text-left {
            font-size: 24px;
            font-weight: bold;
        }

        .col-lg-3 p {
            margin-bottom: 5px;
        }

        .table th {
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        /* Custom Styles */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-lg-3 {
            flex: 0 0 100%;
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Responsive Styles */
        @media (max-width: 767.98px) {
            .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body class="sidebar-mini">
    <div class="container-scroller">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <h3 class="text-left my-5">No.Aduan &nbsp;&nbsp;#{{ $data->no_aduan }}</h3>
                            <hr>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-12" style="padding-left: 15px">
                                <p class="mt-5"><b>Deskripsi Pengguna</b></p>
                                <p>Nama Pengguna : {{ $data->name }}</p>
                                <p>Email Pengguna : {{ $data->email }}</p>
                                <p>No_hp : {{ $data->no_hp }}</p>
                                <p>Lokasi : {{ $data->lokasi }}</p>
                            </div>
                            <div class="col-lg-12" style="padding-left: 15px">
                                <p class="mt-5"><b>Deskripsi Tanggal</b></p>
                                <p>Tanggal Masuk : {{ $data->tgl_masuk }}</p>
                                <p>Tanggal Keluar : {{ $data->tgl_keluar }}</p>
                                <p>Nama pengambil : {{ $data->nama_pengambil }}</p>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-lg-12" style="padding-left: 15px">
                                <p class="mt-5 mb-2 text-right"><b>Deskripsi Aduan</b></p>
                                <p>Email Atasan : {{ $data->email_atasan }}</p>
                                <p>Status : {{ $data->nama_status }}</p>
                                <p>Keluhan : {{ $data->keluhan }}</p>
                            </div>
                        </div>
                        <div class="container-fluid mt-5">
                            <div class="table-responsive">
                                <table id="tabel-main" class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>No Inventaris</th>
                                            <th>Kerusakan</th>
                                            <th>Teknisi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($desc as $desk)
                                            <tr class="">
                                                <td style="text-align: center">{{ $desk->no_inventaris }}</td>
                                                <td style="text-align: center">{{ $desk->name }}</td>
                                                <td style="text-align: center">{{ $desk->kerusakan }}</td>
                                                <td style="text-align: center">{{ $desk->nama_status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
