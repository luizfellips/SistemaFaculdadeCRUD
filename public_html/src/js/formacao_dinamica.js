
$(document).ready(function(){
    $("#curso").on("change",function(){
        $("#formacao").css("display","block");
        $("#formacao").find("option").remove();
        var curso = $(this).val();
        
        $.ajax({
            url:"../src/php/GetFormacoes.php",
            data:{Curso:curso},
            type:"POST",
            success: function(response){
                var data = JSON.parse(response);
                data.forEach(element => {
                    var option = document.createElement("option");
                    option.value = element["formação"];
                    option.innerHTML = element["formação"];
                    document.getElementById('formacao').appendChild(option);
                });
                
            }
        })
    })
})