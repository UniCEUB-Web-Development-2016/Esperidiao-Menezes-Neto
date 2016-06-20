function autores(){
    var pesquisa =  document.getElementById('pesquisa').value;

    $.ajax( {
        method: "GET",
        url:"http://localhost/cliente/autores.php/?pesquisa=" + pesquisa,
        dataType:"json",

        error:function(error){
            alert(error);
        },
        success:function (data) {



            $('.pesquisa').append(

                "<tr>"
                +"<td>Nome Autor</td>"


                +"</tr>"
            );
            $.each(data, function (i){


                $('.pesquisa').append(
                    "<tr>"

                    +"<td>"+data[i].nme_autor +"</td>"


                    +"</tr>"
                );
            });

        }
    });


}
