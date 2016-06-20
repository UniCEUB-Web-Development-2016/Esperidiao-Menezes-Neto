
function cadastro() {
var form = $("form").serialize();
    alert(form);
    $.ajax({
        method: "POST",
        url:"Cadastro.php",
        //url:"http://localhost/biblioteca_web/tb_usuario/?nme_usuario=Ruan&email_usuario=ruan@ruan&dta_nascimento=1999-10-10&senha_usuario=12345&cod_perfil=1",

        //data: {nme_usuario: "Neto", email_ususario: "email@email"},
        data: form,
        error: function (error) {
            alert("ERRO");
        },
        success: function (data) {
            if(data != ''){
                alert("DEU CERTO JOVEM");
                window.location = "index.php";
            }
        }
    });
}   