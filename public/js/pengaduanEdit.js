// let no_aduan = $("#no_aduan").val();
var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,

    autoWidth: false,
    bfilter:false,
    binfo:false,
    ajax: {
        url: APP_URL + "/desc-aduan/get/" + $("#no_aduan").val(),
        method: "GET",
    },
    columns: [
        {
            data: "id_inventaris",
            className: "text-center",
        },

        {
            data: "kerusakan",
            className: "text-center",
        },
        {
            data: "name",
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
            data: null,
            render: function (data, type, row) {
                return (
                    "<div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>" +
                    "<button type='button' class='btn btn-success editData'>TL</button>" +
                    "</div>"
                );
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
$("#id_sperpat").select2({
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
            location.reload()
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
    window.location.href=APP_URL+"/aduan/print/"+id
});