function livros(){
        var pesquisa =  document.getElementById('pesquisa').value;

    $.ajax( {
        method: "GET",
        url:"http://localhost/cliente/livros.php/?pesquisa=" + pesquisa,
        dataType:"json",

        error:function(error){
            alert(error);
        },
        success:function (data) {


            $('.pesquisa').append(

            "<tr>"
            +"<td>Nome</td>"
            +"<td>Data</td>"

            +"</tr>"
            );
            $.each(data, function (i){


                $('.pesquisa').append(
                "<tr>"

                +"<td>"+data[i].nme_livro +"</td>"
                +"<td>"+ data[i].dta_public_livro+"</td>"

                +"</tr>"
                );
            });

        }
    });


}
