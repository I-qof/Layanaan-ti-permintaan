// let no_aduan = $("#no_aduan").val();
var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,

    autoWidth: false,
    bfilter: false,
    binfo: false,
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
                        return "<div class='badge badge-primary' color:#ffffff;'>Proses Pengecekan</div>";
                    case 1:
                        return "<div class='badge badge-success' color:#ffffff;'>Tersedia</div>";
                    case 2:
                        return "<div class='badge badge-danger' color:#ffffff;'>Kosong</div>";
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
            // 1 = belum diisi
            // 2 = stok tersedia
            // 3 = stock tidak tersedia lakukan pembelian

            data: null,
            render: function (data, type, row, meta) {
                if (
                    (data.stock_status == null) |
                    (data.stock_status == 0) |
                    (data.stock_status == "")
                ) {
                    return (
                            "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                            "<button type='button' class='btn btn-success btnCek'>Cek</button>" +
                        "</div>"
                    );
                } else if (data.stock_status == 1) {
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-success btnProgres'>Cek Status</button>" +
                        "</div>"
                    );
                } else if (data.stock_status == 2) {
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-success btnBeli'>Beli</button>" +
                        "</div>"
                    );
                }else{
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

$("#tabel-main").on("click", ".btnCek", function () {
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
$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#id_status").select2({
    width: "100%",
});
$("#id_statusT").select2({
    width: "100%",
});
$("#id_inventaris").select2({
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
$("#formDataTindakLanjut").on("submit", function () {
    let id = $("#idAduan").val();
    $.ajax({
        type: "POST",
        url: APP_URL + "/aduan/tindakLanjut/" + id,
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
