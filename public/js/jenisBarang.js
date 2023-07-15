var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/jenis-barang",
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
            data: "nama_jenis",
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


$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    $("#nama_jenis").val(data.nama_jenis);
    $("#modalAdd").modal("show");
});

$("#openModal").on("click", function () {
    id = 0;
    $("#modalAdd").modal("show")
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    if (id == 0) {
        $.ajax({
            type: "POST",
            url: APP_URL + "/jenis-barang/store",
            data: $("#formData").serialize(),
            
            success: function (response) {
                table.draw(false);
            
                $("#modalAdd").modal("hide");
                $.toast({
                    heading: 'Info',
                    text: 'Data berhasil disimpan!',
                    showHideTransition: 'slide',
                    icon: 'info',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                  })
                table.draw();
            },
            error: function (data) {
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
            type: "POST",
            url: APP_URL + "/jenis-barang/update/" + id,
            data: $("#formData").serialize(),
            
            success: function (response) {
                table.draw(false);
            
                $("#modalAdd").modal("hide");
                $.toast({
                    heading: 'Info',
                    text: 'Data berhasil disimpan!',
                    showHideTransition: 'slide',
                    icon: 'info',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                  })
                table.draw();
            },
            error: function (data) {
            

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

$(".cancel").on("click", function () {
    $("#modalAdd").modal("hide");
});
$(".close").on("click", function () {
    $("#modalAdd").modal("hide");
});

$("#tabel-main").on("click", ".hapusData", function () {
    // alert("halo");
      data = table.rows($(this).closest('tr').index()).data()[0];
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
        if(result){
            // alert("hy")
            $.ajax({
                type : 'GET',
                url  : APP_URL + '/jenis-barang/delete/' + data.id,
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
