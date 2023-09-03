var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/permintaan/approvedIndex",
        method: "GET",
    },
    columns: [
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
            data: "name",
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
        },
        {
            data: "nama_pengambil",
            className: "text-center",
        },
        {
            data: null,
            render: function (data, type, row) {
                if (row.approve_status == 1) {
                    return (
                        "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                        "<button type='button' class='btn btn-primary approve permintaan-tindak-lanjut'>Approve</button>" +
                        "</div>"
                    );
                }else{
                    return (
                        `<div class="badge badge-success">Sudah diapprove</div`
                    )
                }
            },
            className: "text-center",
        },
    ],
    drawCallback: function () {
        // $(".permintaan-tindak-lanjut").css({
        //     display: "none",
        //     visibility: "hidden",
        // });
        $(".permintaan-tindak-lanjut").hide();

        let menus = JSON.parse(localStorage.getItem("menus"));
        menus.forEach((elem) => {
            $("." + elem.name).show();
        });
    },
});

$("#tabel-main").on("click", ".approve", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    swal({
        title: "Approve Data?",
        text: "Apakah Anda yakin Melakukan Approve Pada Data ini!",
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
                url: APP_URL + "/permintaan/approve/" + data.no_aduan,
                success: function (response) {
                    console.log(response);
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
$("#tabel-main").on("click", ".reject", function () {
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
                url: APP_URL + "/permintaan/delete/" + data.id,
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
