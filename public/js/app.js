$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// $("#linkAduan").on("click", function () {
//     // alert("test")
//     window.location.replace(APP_URL + "/aduan/view");
// });
// $("#linkAduanReport").on("click", function () {
//     window.location.replace(APP_URL + "/aduan/report");
// });

// $("#linkPermintaanReport").on("click", function () {
//     window.location.replace(APP_URL + "/permintaan/view");
// });
// $("#linkPermintaanReport").on("click", function () {
//     window.location.replace(APP_URL + "/permintaan/report");
// });
// $("#linkUserrole").on("click", function () {
//     window.location.replace(APP_URL + "/user-role/view");
// });
// $("#linkRole").on("click", function () {
//     window.location.replace(APP_URL + "/role/view");
// });
// $("#linkPermission").on("click", function () {
//     window.location.replace(APP_URL + "/permission/view");
// });

// $("#linkStatus").on("click", function () {
//     window.location.replace(APP_URL + "/status/view");
// });
// $("#linkSperpat").on("click", function () {
//     window.location.replace(APP_URL + "/sperpat/view");
// });
// $("#linkInventaris").on("click", function () {
//     window.location.replace(APP_URL + "/inventaris/view");
// });
// $("#linkJenisbarang").on("click", function () {
//     window.location.replace(APP_URL + "/jenis-barang/view");
// });
