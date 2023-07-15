var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/permissions/get",
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
            data: "name",
            className: "text-center",
        },
        {
            data: null,
            render: function (data, type, row) {
                return (
                    "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                    "<button type='button' class='btn btn-success editData permission-update'>Edit</button>" +
                    "<button type='button' class='btn btn-danger hapusData permission-delete'>Hapus</button>" +
                    "</div>"
                );
            },
            className: "text-center",
        },
    ],
    // initComplite: function () {
    //     let menus = JSON.parse(localStorage.getItem("menus"));

    //     menus.forEach((elem) => {
    //         $("." + elem.name).show();
    //     });
    // },
});

// $("#tabel-main_filter").hide();

// $(table.table().container()).on("keyup", "thead input", function (index) {
//     table.column($(this).attr("id").substring(7, 10)).search(this.value).draw();
// });

let id;

$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#openModal").on("click", function () {
    id = 0;
    $("#name").val("");
    $("#modalAdd").modal("show");
});

$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];

    id = data.id;
    $("#name").val(data.name);
    $("#modalAdd").modal("show");
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    if (id == 0) {
        $.ajax({
            type: "POST",
            url: APP_URL + "/permissions/store",
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
            },
            error: function (data) {
                $.toast({
                    heading: "Info",
                    text: "Data gagal disimpan!",
                    showHideTransition: "slide",
                    icon: "info",
                    loaderBg: "#46c35f",
                    position: "top-right",
                });
                var msg = data.responseJSON;
                var message = "";

                $.each(msg, function (key, valueObj) {
                    valueObj.forEach((item, i) => {
                        message += ". " + item + "<br>";
                    });
                });
            },
        });
    } else {
        $.ajax({
            type: "PUT",
            url: APP_URL + "/permissions/update/" + id,
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
            },
            error: function (data) {
                $.toast({
                    heading: "Info",
                    text: "Data gagal disimpan!",
                    showHideTransition: "slide",
                    icon: "info",
                    loaderBg: "#46c35f",
                    position: "top-right",
                });
                var msg = data.responseJSON;
                var message = "";

                $.each(msg, function (key, valueObj) {
                    valueObj.forEach((item, i) => {
                        message += ". " + item + "<br>";
                    });
                });
            },
        });
    }
});

$("#tabel-main").on("click", ".hapusData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    swal({
        title: 'Hapus Data?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
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
            closeModal: true
          }
        }
      }).then(function(result){
        if (result) {
            $.ajax({
                type: "DELETE",
                url: APP_URL + "/permissions/delete/" + data.id,

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
        }
    });
});
