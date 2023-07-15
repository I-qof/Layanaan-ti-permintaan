var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/aduan",
        method: "GET",
    },
    columns: [
        {
            data: null,
            render: function (data, type, row) {
                return (
                    "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                    "<button type='button' class='btn btn-success editData'>Tindak</button>" +
                    "<button type='button' class='btn btn-danger hapusData'>Hapus</button>" +
                    "</div>"
                );
            },
            className: "text-center",
        },
        {
            data: "id",
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
            className: "text-center",
        },

        {
            data: "no_aduan",
            className: "text-center",
        },
        {
            data: "email",
            className: "text-center",
        },
        {
            data: "tgl_masuk",
            className: "text-center",
        },
        {
            data: "tgl_keluar",
            className: "text-center",
        },
        {
            data: "no_hp",
            className: "text-center",
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
                    ";font-weight: bold '><p style='color:#ffff'>" +
                    data +
                    "</p></div>"
                );
            },
        },
        {
            data: "nama_pengambil",
            className: "text-center",
        },
    ],
});

$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
  
    window.location.href = APP_URL + "/aduan/updateView/" + id;
});
$("#tabel-main").on("click", ".hapusData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    swal({
        title: "Hapus Data?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
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
            // alert("hy")
            $.ajax({
                type: "GET",
                url: APP_URL + "/aduan/delete/" + data.id,
                success: function (response) {
                    $.toast({
                        heading: "Info",
                        text: "Data berhasil dihapus!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    table.draw();
                },
                error: function (data) {
                    toastr["error"]("Masih terdapat Error!", "Error");
                },
            });
        }
    });
});
