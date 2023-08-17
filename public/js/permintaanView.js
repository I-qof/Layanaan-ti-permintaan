$("#cari").on("click", function () {
    let id = $("#inp_cari").val();
    $.ajax({
        type: "get",
        url: APP_URL + "/permintaan/search/" + id,
        success: function (response) {
            console.log(response);
           
                $("#alasan_permintaan").html(response.alasan_permintaan);
                $("#no_aduan").html(response.no_aduan);
                $("#no_hp").html(response.no_hp);
                $("#lokasi").html(response.lokasi);
                $("#email_atasan").html(response.email_atasan);
                $("#tgl_masuk").html(response.tgl_masuk);
                $("#tgl_keluar").html(response.tgl_keluar);
                $("#nama_status").html(response.nama_status);
                $("#nama_pengambil").html(response.nama_pengambil);
                $("#departement").html(response.departement);
                $("#name").html(response.name);

                $("#modalHasil").modal("show");
        },
        error:function(response){
            $("#modalHasilFailed").modal("show");
        }
    });
});
$(".print").on("click", function () {
    let id = $("#inp_cari").val(); 
    window.location.href=APP_URL+"/permintaan/print/"+id
});

$(".cancel").on("click", function () {
    $("#modalHasil").modal("hide");
    $("#modalHasilFailed").modal("hide");
});
$(".close").on("click", function () {
    $("#modalHasil").modal("hide");
    $("#modalHasilFailed").modal("hide");
});
