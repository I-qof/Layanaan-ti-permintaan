// $("#roles").select2();
let id;
$.getJSON(APP_URL + "/role/get", function (data) {
    data.data.forEach((item, i) => {
        $("#roles").append(
            $("<option>", {
                value: item.name,
                text: item.name,
            })
        );
    });
});

var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/userroles/get",
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
            data: "email",
            className: "text-center",
        },
        {
            data: "roles",
            className: "text-center",
            render: function (data, type, row) {
                var menus = data.map(function (role) {
                    return role.name;
                });
                return menus.join(", ");
            },
        },
        {
            data: null,
            render: function (data, type, row) {
                return (
                    "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                    "<button type='button' class='btn btn-success editData'>Edit</button>" +
                    "<button type='button' class='btn btn-danger hapusData'>Hapus</button>" +
                    "</div>"
                );
            },
            className: "text-center",
        },
    ],
});

$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#openModal").on("click", function () {
    $("#id").val(0);
    $("#name").val("");
    $("#email").val("");
    $("#selLevel").val("1").trigger("change");
    $("#modalAdd").modal("show");
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    let idku = $("#id").val();
    if (idku == 0) {
        $.ajax({
            type: "POST",
            url: APP_URL + "/userroles/store",
            data: $("#formData").serialize(),

            success: function (response) {
                table.draw(false);

                $("#modalAdd").modal("hide");
                $.toast({
                    heading: "Info",
                    text: "Data berhasil diubah!",
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
                var msg = data.responseJSON;
                var message = "";

                $.each(msg, function (key, valueObj) {
                    valueObj.forEach((item, i) => {
                        message += ". " + item + "<br>";
                    });
                });

                toastr["error"](message, "Error");
            },
        });
    } else {
        $.ajax({
            type: "PATCH",
            url: APP_URL + "/userroles/update",
            data: $("#formData").serialize(),

            success: function (response) {
                table.draw(false);

                $("#modalAdd").modal("hide");
                $.toast({
                    heading: "Info",
                    text: "Data berhasil diubah!",
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
                var msg = data.responseJSON;
                var message = "";

                $.each(msg, function (key, valueObj) {
                    valueObj.forEach((item, i) => {
                        message += ". " + item + "<br>";
                    });
                });

                toastr["error"](message, "Error");
            },
        });
    }
});

$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];

    $("#id").val(data.id);
    $("#name").val(data.name);
    $("#email").val(data.email);

    $("#modalAdd").modal("show");
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
            $.ajax({
                type: "DELETE",
                url: APP_URL + "/user",
                data: "id=" + data.id,

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
                        text: "Masih terdapat error!",
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
