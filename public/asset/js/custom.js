$(document).ready(() => {

    var table2 = document.getElementById("table-2c")
    if(table2)
    {
        $('#table-2c').DataTable( {
            paging: true
        } );
    }

    var successElement = document.getElementById("success");
    var failElement = document.getElementById("error");
    if(successElement){
        swal({
            text: successElement.innerHTML,
            icon: "success",
        });
    } else if (failElement) {
        swal({
            text: failElement.innerHTML,
            icon: "error",
        });
    }
});

//preview image
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

// tombol logout
function logout()
{
    swal({
        title: "Apakah anda yakin?",
        text: "Apakah anda yakin ingin keluar dari sistem ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })

        .then((logout) => {
            if (logout) {
                document.getElementById("logout").submit();
                }
            });

}

// tombol delete data
function deleteData(btnID, idData, urlDelete, title) {
    $('#btndelete'+btnID).click(function (e) {

        swal({
                title: "Apakah anda yakin?",
                text: "Data "+title+" dan data yang berelasi akan terhapus sehingga tidak dapat dipulihkan kembali!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    //parameter ajax
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var data = {
                        "_token": CSRF_TOKEN
                    };

                    //ajax call (ex. '/admin/mobil/ + id')
                    $.ajax({
                        type: "DELETE",
                        url: urlDelete + idData,
                        data: data,
                        dataType: 'json',
                        success: function (response) {
                            if(response.response_code == 200){
                                console.log(response.result);
                                swal(response.result, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }else{
                                console.log(response.response_code + " <==> Throw error <==> "+ response.error_message )
                            }
                        },
                        error: function (err,e) {
                            for(var x in err){
                                console.log(x + " <=> error index of <=> " + err[x])
                            }
                        }
                    });


                }
            });
    });
}
