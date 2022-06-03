$(document).ready(function() {
    $("#codeForm").submit(function(){
        $.ajax({
            url:'qr_mostrar.php',
            type:'POST',
            data: {formData:$("#content").val(), ecc:$("#ecc").val(), size:$("#size").val()},
            success: function(response) {
                $(".showQRCode").html(response);  
            },
         });
    });
});
