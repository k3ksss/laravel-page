



//KOMISIJAS NOSAUKUMA SAGLABASANA
function saveKomisijasNosaukums(){
    $('#KomisijasNosaukums').modal('show');
    $("#komisijas_nosaukums").val("");
    $("#saveKomisijasNosaukums").one('click',function(){
        var komisijas_nosaukums = $("#komisijas_nosaukums").val();
        var token = $(this).data('token');
        $.ajax({
            url: 'apa/saveKomisijasNosaukums',
            type: 'post',
            data: {_method:'post', _token:token, komisijas_nosaukums:komisijas_nosaukums},
            success: function(result) {
               $('#OkModal').modal('show');
                $('#reload').click(function () {
                    location.reload();
                })
            }
        });

    });

}

//KOMISIJAS NOSAUKUMA DZĒŠANA
function deleteKomisijasNosaukumsTabula(){
    $('.delete').click(function(){
        console.log("Delete");
        var id = $(this).val();
        var token = $(this).data('token');
        $.ajax({
            url: 'komisijasnosaukums/select/'+id+'',
            type: 'post',
            data: {_method:'get', id:id},
            success: function(result) {
                $('#DeleteModal').modal('show');
                $('#acceptDelete').one('click',function(){
                    var newid = result.id;
                    var token = $(this).data('token');
                    $.ajax({
                        url: 'komisijasnosaukums/delete/'+newid+'',
                        type: 'post',
                        data: {_method:'delete', _token:token},
                        success: function(result) {
                            $("button[value='"+result.id+"']").closest('tr').fadeOut('slow');
                        }
                    });
                });
            }
        });
    });

}


//KOMISIJAS NOSAUKUMA LABOŠANA
function editKomisijasVeids(){
    $('.edit').click(function(){
        var id = $(this).val();
        $.ajax({
            url: 'komisijasnosaukums/select/'+id+'',
            type: 'post',
            data: {_method:'get', id:id},
            success: function(result) {
                $('#editKomisijasVeidsModule').modal('show');
                $("#newKomisijasVeids input[name='komisijas_nosaukums']").val(result.komisijas_nosaukums);
                $('#updateKomisijasVeids').one('click',function(){
                    var newid = result.id;
                    console.log(result.id);
                    var token = $(this).data('token');
                    var komisijas_nosaukums = $("#newKomisijasVeids input[name='komisijas_nosaukums']").val();
                    $.ajax({
                        url: 'komisijasnosaukums/update/'+newid+'',
                        type: 'post',
                        data: {_method:'put', _token:token, komisijas_nosaukums:komisijas_nosaukums},
                        success: function(result) {
                            $("button[value='"+result.id+"']").closest('tr').children("td[class='komisijasNosaukums']").hide().html(result.komisijas_nosaukums).fadeIn('fast');
                        }
                    });

                });

            }
        });
    });
}


// function deleteKomisijasNosaukums (){
//     $(".delete").click(function (){
//         $('#DeleteModal').modal('show');
//         $(".deletegType").one('click', function () {
//             var id = $(this).val();
//             $('#gtypeModal').modal('hide');
//             $('#DeleteModal').modal('show');
//             deleteGroupDetail("#acceptDelete", "group/deletegType/", id, "#DeleteModal", "#gtypeModal");
//
//         });
//     });
// }

