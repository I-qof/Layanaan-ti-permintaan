// let no_aduan = $("#no_aduan").val();
var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/desc-permintaan/get/" + $("#no_aduan").val(),
        method: "GET",
    },
    columns: [
        {
            data: "nama_jenis",
            className: "text-center",
        },

        {
            data: "deskripsi",
            className: "text-center",
        },
        {
            data: "stock_status",
            className: "text-center",
            render: function (data, type, meta, row) {
                switch (data) {
                    case 0:
                        return "<div class='badge badge-primary' color:#ffffff;'>Lakukan cek</div>";
                    case 1:
                        return "<div class='badge badge-danger' color:#ffffff;'>Kosong</div>";
                    case 2:
                        return "<div class='badge badge-success' color:#ffffff;'>Tersedia</div>";
                    default:
                        return "<div class='badge badge-success' color:#ffffff;'>Selesai</div>";
                }
            },
        },
        {
            data: "nama_status",
            className: "text-center",
            render: function (data, type, row, meta) {
                return (
                    "<div class='badge badge-primary' style='background-color:" +
                    row.color +
                    ";border:" +
                    row.color +
                    ";font-weight:bold;color:#ffffff;'>" +
                    data +
                    "</div>"
                );
            },
        },

        {
            // note :
            // 0 = cek barang
            // 1 = stok kosong
            // 2 = stok tersedia
            // 3 = stock konfirmasi Pembelian
            // 4 = lakukan pembelian

            data: null,
            render: function (data, type, row, meta) {
                if (
                    (data.stock_status == null) |
                    (data.stock_status == 0) |
                    (data.stock_status == "")
                ) {
                    //arahkan modal cek status apakah tersedia
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-success btnCek'>Cek Stock</button>" +
                        "</div>"
                    );
                } else if (data.stock_status == 2) {
                    // arahkan modal ubah status selesai
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-success btnProgres'>Cek Status</button>" +
                        "</div>"
                    );
                } else if (data.stock_status == 1) {
                    //kirim email

                    // note
                    // 1 = pembelian diterima
                    // 2 = pembeliaan ditolak
                    // 0 = belum dilakukan pembelian
                    if (row.pembelian_status == 1) {
                        // menampilkan modal pembelian
                        return (
                            "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                            "<button type='button' class='btn btn-primary btnBeliInventaris'>Pembelian diterima</button>" +
                            "<button type='button' class='btn btn-success btnProgres'>Cek Status</button>" +
                            "</div>"
                        );
                    } else if (row.pembelian_status == 2) {
                        // menampilkan cek status
                        return (
                            "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                            "<button type='button' class='btn btn-danger btnProgres'>Permintaan ditolak</button>" +
                            "</div>"
                        );
                    } else {
                        // modal konfirmasi pembelian
                        return (
                            "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                            "<button type='button' class='btn btn-success btnKonfirmasi'>Konfirmasi Pembelian</button>" +
                            "</div>"
                        );
                    }
                } else {
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-success btnProgres'>Cek Status</button>" +
                        "</div>"
                    );
                }
            },
            className: "text-center",
        },
    ],
});
$("#tabel-main").on("click", ".btnBeliInventaris", function (e) {
    e.preventDefault();
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    $("#id_desc_permintaan").val(id);
    // alert(id);
    //fungsi cek pembelian
    $.ajax({
        type: "get",
        url: APP_URL + "/desc-pembelian/getById/" + id,
        success: function (response) {
            console.log(response);
            $("#url_pembelian").val(response.data.url_pembelian);
            $("#harga_beli").val(response.data.harga_beli);
            $("#no_inventaris")
                .val(response.data.no_inventaris)
                .trigger("change");
            $("#status_pembayaran")
                .val(response.data.status_pembayaran)
                .trigger("change");
        },
        error: function () {
            console.log("error");
        },
    });
    $("#modalAddBeli").modal("show");
});
$("#tabel-main").on("click", ".editData", function (e) {
    e.preventDefault();
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    console.log(id);
    $.ajax({
        type: "get",
        url: APP_URL + "/desc-aduan/getById/" + id,
        success: function (response) {
            console.log(response);
            $("#deskripsi").val(response.data.deskripsi);
            $("#id").val(response.data.id);
            $("#id_inventaris_pemakai").val(response.data.id_inventaris);
            $("#diagnosa").val(response.data.diagnosa);
            $("#tindakan").val(response.data.tindakan);
            $("#id_status").val(response.data.id_status).trigger("change");
            $("#id_sperpat").val(response.data.id_sperpat).trigger("change");
        },
        error: function () {
            console.log("error");
        },
    });
    $("#modalAdd").modal("show");
});

$("#tabel-main").on("click", ".btnBeli", function () {
    let id = $("#no_aduan").val();
    swal({
        title: "Ketersediaan Barang",
        text: "Apakah Barang tersedia?",
        icon: "warning",
        className: "text-center",
        showCancelButton: true,
        confirmButtonColor: "#3f51b5",
        cancelButtonColor: "#ff4081",
        confirmButtonText: "Great ",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "Tersedia",
                value: 1,
                visible: true,
                className: "btn btn-success",
                closeModal: true,
            },
            confirm1: {
                text: "Kosong",
                value: 2,
                visible: true,
                className: "btn btn-primary",
                closeModal: true,
            },
        },
    }).then(function (result) {
        if (result == 1) {
            // alert("tersedia")
            $.ajax({
                type: "GET",
                url: APP_URL + "/desc-permintaan/tersedia/" + id,
                success: function (response) {
                    table.draw(false);
                    $("#modalAdd").modal("hide");
                    $.toast({
                        heading: "Sekses",
                        text: "Data berhasil disimpan!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    location.reload();
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        } else if (result == 2) {
            // alert("kosong")
            $.ajax({
                type: "GET",
                url: APP_URL + "/desc-permintaan/kosong/" + id,
                success: function (response) {
                    table.draw(false);
                    $("#modalAdd").modal("hide");
                    $.toast({
                        heading: "Sekses",
                        text: "Data berhasil disimpan!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    location.reload();
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        }
    });
});
$("#tabel-main").on("click", ".btnKonfirmasi", function (e) {
    e.preventDefault();
    // let id = $("#no_aduan").val();
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    $.ajax({
        type: "GET",
        url: APP_URL + "/desc-permintaan/kosong/" + id,
        success: function (response) {
            table.draw(false);
            $("#modalAdd").modal("hide");
            $.toast({
                heading: "Sekses",
                text: "Data telah terkirim Untuk Konfirmasi!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
            // location.reload();
        },
        error: function (data) {
            $.toast({
                heading: "Error",
                text: "Error!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
    });
});
$("#tabel-main").on("click", ".btnCek", function () {
    // let id = $("#no_aduan").val();
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;

    swal({
        title: "Ketersediaan Barang",
        text: "Apakah Barang tersedia?",
        icon: "warning",
        className: "text-center",
        showCancelButton: true,
        confirmButtonColor: "#3f51b5",
        cancelButtonColor: "#ff4081",
        confirmButtonText: "Great ",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "Tersedia",
                value: 1,
                visible: true,
                className: "btn btn-success",
                closeModal: true,
            },
            confirm1: {
                text: "Kosong",
                value: 2,
                visible: true,
                className: "btn btn-primary",
                closeModal: true,
            },
        },
    }).then(function (result) {
        if (result == 1) {
            // alert("tersedia")
            $.ajax({
                type: "GET",
                url: APP_URL + "/desc-permintaan/tersedia/" + id,
                success: function (response) {
                    table.draw(false);
                    $("#modalAdd").modal("hide");
                    $.toast({
                        heading: "Sekses",
                        text: "Data berhasil disimpan!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    location.reload();
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        } else if (result == 2) {
            // alert("kosong")
            $.ajax({
                type: "GET",
                url: APP_URL + "/desc-permintaan/kosong/" + id,
                success: function (response) {
                    table.draw(false);
                    $("#modalAdd").modal("hide");
                    $.toast({
                        heading: "Sekses",
                        text: "Data berhasil disimpan!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    location.reload();
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        }
    });
});
$(".approve").on("click", function () {
    let id = $("#no_aduan").val();
    swal({
        title: "Approve Permintaan?",
        text: "Apakah anda yakin melakukan approve pada data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3f51b5",
        cancelButtonColor: "#ff4081",
        confirmButtonText: "Great ",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-primary",
                closeModal: true,
            },
        },
    }).then(function (result) {
        if (result) {
            $.ajax({
                type: "GET",
                url: APP_URL + "/permintaan/approve/" + id,
                success: function (response) {
                    table.draw(false);
                    $("#modalAdd").modal("hide");
                    $.toast({
                        heading: "Sekses",
                        text: "Data berhasil diapprove!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    location.reload();
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        }
    });
});
let id;
$("#tabel-main").on("click", ".btnProgres", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    console.log(id);
    $("#id_status_deskripsi").val(data.id_status_deskripsi).trigger("change");
    $("#id_status_qc").val(data.id_status_qc).trigger("change");
    $("#id_status_penyelesaian")
        .val(data.id_status_penyelesaian)
        .trigger("change");
    $("#id_status1").val(data.id_status).trigger("change");
    $("#modalStatus").modal("show");
});
$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#id_status").select2({
    width: "100%",
});
$("#no_inventaris").select2({
    width: "100%",
});
$("#status_pembayaran").select2({
    width: "100%",
});
$("#id_statusT").select2({
    width: "100%",
});
$("#id_inventaris").select2({
    width: "100%",
});
$("#id_status_deskripsi").select2({
    width: "100%",
});
$("#id_status_qc").select2({
    width: "100%",
});
$("#id_status_penyelesaian").select2({
    width: "100%",
});
$("#id_status1").select2({
    width: "100%",
});
$(".tindakLanjut").on("click", function () {
    $("#formData").trigger("reset");
    $("#modalTindakLanjut").modal("show");
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    let id = $("#id").val();

    $.ajax({
        type: "POST",
        url: APP_URL + "/desc-aduan/update/" + id,
        data: $("#formData").serialize(),

        success: function (response) {
            table.draw(false);

            $("#modalAdd").modal("hide");
            $.toast({
                heading: "Info",
                text: "Data berhasil disimpan!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
            table.draw();
        },
        error: function (data) {
            $.toast({
                heading: "Info",
                text: "Error!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
    });
});
$("#formDataTindakLanjut").on("submit", function (e) {
    e.preventDefault();
    let id = $("#idAduan").val();
    console.log(id);
    $.ajax({
        type: "GET",
        url: APP_URL + "/permintaan/tindakLanjut/" + id,
        data: $("#formDataTindakLanjut").serialize(),

        success: function (response) {
            table.draw(false);

            $("#modalTindakLanjut").modal("hide");
            $("#formDataTindakLanjut").trigger("reset");
            location.reload();
            $.toast({
                heading: "Info",
                text: "Data berhasil disimpan!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
        error: function (data) {
            $.toast({
                heading: "Info",
                text: "Error!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
    });
});

$(".print").on("click", function () {
    let id = $("#no_aduan").val();
    window.location.href = APP_URL + "/aduan/print/" + id;
});
$(".btnAmbil").on("click", function () {
    let id = $("#no_aduan").val();
    console.log(id);
    swal({
        title: "Kirim Email?",
        text: "Apakah anda yakin melakukan pengiriman email kepada user untuk melakukan pengambilan perangkat!",
        className: "item-center",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3f51b5",
        cancelButtonColor: "#ff4081",
        confirmButtonText: "Great ",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-primary",
                closeModal: true,
            },
        },
    }).then(function (result) {
        if (result) {
            $.ajax({
                type: "GET",
                url: APP_URL + "/permintaan/ambil/" + id,
                success: function (response) {
                    table.draw(false);
                    $.toast({
                        heading: "Sekses",
                        text: "Email Berhasil Dikirim!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
                error: function (data) {
                    $.toast({
                        heading: "Error",
                        text: "Error!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                },
            });
        }
    });
});

$("#formDataStatus").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: APP_URL + "/desc-permintaan/status/" + id,
        data: $("#formDataStatus").serialize(),

        success: function (response) {
            table.draw();
            $("#modalStatus").modal("hide");
            $.toast({
                heading: "Info",
                text: "Data berhasil disimpan!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
        error: function (data) {
            $.toast({
                heading: "Info",
                text: "Error!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
    });
});
$("#formDataBeli").on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: APP_URL + "/desc-pembelian/store",
        data: $("#formDataBeli").serialize(),

        success: function (response) {
            table.draw();
            $("#modalAddBeli").modal("hide");
            $.toast({
                heading: "Info",
                text: "Data berhasil disimpan!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
        error: function (data) {
            $.toast({
                heading: "Info",
                text: "Error!",
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            });
        },
    });
});
