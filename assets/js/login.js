$(document).ready(function () {
    //$("#Formlogin").attr('action','<?='+BASE_URL+'()')
});






    $("#Formlogin").submit(function(){
        var datalogin = $("#Formlogin").serialize();
        $.ajax({
            url: BASE_URL+"Login/Loguearse",
            type: 'post',
            dataType: 'json',
            data: datalogin,
            success: function(data) {
                   
                       console.log(data);
                      
                     },
            error: function(error,estado) {
             
                console.log(error);
                console.log(estado);
            }
        });
    });
