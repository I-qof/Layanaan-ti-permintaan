$("#cari").on("click", function () {
    let id = $("#inp_cari").val();
    $.ajax({
        type: "get",
        url: APP_URL + "/aduan/search/" + id,
        success: function (response) {
            console.log(response);
           
                $("#keluhan").html(response.keluhan);
                $("#no_aduan").html(response.no_aduan);
                $("#no_hp").html(response.no_hp);
                $("#lokasi").html(response.lokasi);
                $("#email_atasan").html(response.email_atasan);
                $("#tgl_masuk").html(response.tgl_masuk);
                $("#tgl_keluar").html(response.tgl_keluar);
                $("#id_status").html(response.id_status);
                $("#nama_pengambil").html(response.nama_pengambil);

                $("#email").val(response.email);
                $("#modalHasil").modal("show");
        },
        error:function(response){
            $("#modalHasilFailed").modal("show");
        }
    });
});
$(".print").on("click", function () {
    let id = $("#inp_cari").val(); 
    window.location.href=APP_URL+"/aduan/print/"+id
});

$(".cancel").on("click", function () {
    $("#modalHasil").modal("hide");
    $("#modalHasilFailed").modal("hide");
});
$(".close").on("click", function () {
    $("#modalHasil").modal("hide");
    $("#modalHasilFailed").modal("hide");
});
