var table = $("#tabel-main").DataTable({
    bLengthChange: false,
    ordering: false,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: APP_URL + "/sperpat",
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
            data: "nama_sperpat",
            className: "text-center",
        },
        {   
            data: "no_inventaris",
            className: "text-center",
        },
        {   
            data: "status_pemakaian",
            className: "text-center",
            render:function(data,type,meta,row){
                if(data == 1){
                    return("<div class='badge badge-danger'>Tidak dipakai</div>");
                }
                return("<div class='badge badge-success'>Sedang dipakai</div>")
            }
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

$("#id_jenis").select2();


$("#tabel-main").on("click", ".editData", function () {
    data = table.rows($(this).closest("tr").index()).data()[0];
    id = data.id;
    $("#nama_sperpat").val(data.nama_sperpat);
    $("#id_jenis").val(data.id_jenis).trigger("change");
    $("#no_inventaris").val(data.no_inventaris);
    $("#deskripsi").val(data.deskripsi);
    $("#modalAdd").modal("show");
});

$("#openModal").on("click", function () {
    id = 0;
    $("#formData").trigger("reset");
    $("#id_jenis").val("").trigger("change");
    $("#modalAdd").modal("show")
});

$("#formData").on("submit", function (event) {
    event.preventDefault();
    if (id == 0) {
        $.ajax({
            type: "POST",
            url: APP_URL + "/sperpat/store",
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
            url: APP_URL + "/sperpat/update/" + id,
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
                url  : APP_URL + '/sperpat/delete/' + data.id,
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
