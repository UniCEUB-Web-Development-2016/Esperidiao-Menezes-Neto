
function submitSignIn(){
    var email = document.getElementById("inputEmail").value;
    var senha = document.getElementById("inputPassword").value;

    if(email != "" && senha != ""){
        $.ajax( {
            method: "GET",
            url:"http://localhost/biblioteca_web/login/?email_usuario="+ email +"&senha_usuario=" + senha,
            dataType:"json",


            error:function(error){
                alert(error);
            },
            success:function (data) {

                if(data == false){
                    alert('DIGITE O E-MAIL E SENHA CORRETAMENTE');
                    location.href= "/index.php";
                }else{
                    location.href= "/cliente/telaInicio.html";
                }


            }
        });
    }

}
