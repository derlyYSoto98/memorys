$(document).ready(function() {
    $("#codeForm").submit(function(){
        /* alert("ingreso"); */
        $.ajax({
            url:'qr_mostrar.php',
            type:'POST',
            data: {formData:$("#idproceso").val()},
            success: function(response) {
                $(".showQRCode").html(response);  
            },
         });
    });
});
