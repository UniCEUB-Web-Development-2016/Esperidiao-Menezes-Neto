function editora(){
    var pesquisa =  document.getElementById('pesquisa').value;

    $.ajax( {
        method: "GET",
        url:"http://localhost/cliente/editoras.php/?pesquisa=" + pesquisa,
        dataType:"json",

        error:function(error){
            alert('erro');
        },
        success:function (data) {


            $('.pesquisa').append(

                "<tr>"
                +"<td>Nome Editora</td>"


                +"</tr>"
            );
            $.each(data, function (i){


                $('.pesquisa').append(
                    "<tr>"

                    +"<td>"+data[i].nme_editora +"</td>"

                    +"</tr>"
                );
            });

        }
    });


}
