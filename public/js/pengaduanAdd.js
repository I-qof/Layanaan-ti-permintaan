(function ($) {
    "use strict";
    var form = $("#example-form");
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex) {
            console.log($("#example-form").serialize());
            $.ajax({
                type: "POST",
                url: APP_URL + "/aduan/store",
                data: $("#example-form").serialize(),

                success: function (response) {
                    $.toast({
                        heading: "Info",
                        text: "Data berhasil disimpan!",
                        showHideTransition: "slide",
                        icon: "info",
                        loaderBg: "#46c35f",
                        position: "top-right",
                    });
                    $("#example-form").trigger("reset");
                    window.location.href = APP_URL + "/aduan/add";
                    //   window.location(APP_URL + "/aduan/add");
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
        },
    });
    var validationForm = $("#example-validation-form");
    validationForm.val({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password",
            },
        },
    });
    validationForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            validationForm.val({
                ignore: [":disabled", ":hidden"],
            });
            return validationForm.val();
        },
        onFinishing: function (event, currentIndex) {
            validationForm.val({
                ignore: [":disabled"],
            });
            return validationForm.val();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        },
    });
    var verticalForm = $("#example-vertical-wizard");
    verticalForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        },
    });
})(jQuery);

// let no_aduan = $("#no_aduan").val();
$("#openModal").on("click", function (e) {
    e.preventDefault();
    id = 0;
    $("#modalAdd").modal("show");
});

$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    if (id == 0) {
    $.ajax({
        type: "POST",
        url: APP_URL + "/desc-aduan/store",
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
            var msg = data.responseJSON;
            var message = "";

            $.each(msg, function (key, valueObj) {
                valueObj.forEach((item, i) => {
                    message += ". " + item + "<br>";
                });
            });

            toastr["error"](message, "Error");
        },
    });}else{
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
$("#tabel-main").on("click", ".hapusData", function () {
  data = table.rows($(this).closest('tr').index()).data()[0];
      swal({
        title: 'Hapus Data Ini?',
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
        if(result){
            // alert("hy")
            $.ajax({
                type : 'GET',
                url  : APP_URL + '/desc-aduan/delete/' + data.id,
                success :  function(response){
                    $.toast({
                        heading: 'Info',
                        text: 'Data berhasil dihapus!',
                        showHideTransition: 'slide',
                        icon: 'info',
                        loaderBg: '#46c35f',
                        position: 'top-right'
                      })
                    table.draw();
                },
                error: function(data){
                    toastr["error"]("Masih terdapat Error!", "Error");
                }
            });
          }
      })
  
});
$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    $("#id_inventaris").val(data.id_inventaris);
    $("#kerusakan").val(data.kerusakan);
    $("#modalAdd").modal("show");
});
$("#id_inventaris").select2({
    width: "100%",
});

var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/desc-aduan/get/" + $("#no_aduan").val(),
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
            data: "id_inventaris",
            className: "text-center",
        },
        {
            data: "kerusakan",
            className: "text-center",
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
