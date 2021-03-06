<?php
include("hearder.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <!--<link href="signin.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="js/ie-emulation-modes-warning.js"></script>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery/jquery-1.11.3.min.js"></script>
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="js/livros.js"></script>
    <link href="css/singin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script type="text/javascript">
    window.onload = function(){
        $.ajax( {
            method: "GET",
            url:"http://localhost/biblioteca_web/ta_livro/?idt_livro=",
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

                            +"<td><a href='http://localhost/biblioteca_web/Livros/"+data[i].caminho_livro+"'>"+data[i].nme_livro +"</a></td>"
                            +"<td>"+ data[i].dta_public_livro+"</td>"

                            +"</tr>"
                    );
                });

            }
    });
    }
</script>

<body>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="telaInicio.html">Biblioteca WEB</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Livros</a>
                </li>
                <li>
                    <a href="Editoras.html">Editora</a>
                </li>
                <li>
                    <a href="Autores.html">Autores</a>
                </li>
                <li>
                    <a href="Upload.html">Upload</a>
                </li>

            </ul>
            <form>
            <div class="input-group custom-search-form" style="margin-top: 9px;">

                <input type="text" class="form-control" placeholder="Search..." id="pesquisa" name="pesquisa">
                    <span class="input-group-btn">
                            <input class="btn btn-default" onclick="livros()" style="width: 30px;height: 34px;margin-left: 0px;">
                                <i class="glyphicon glyphicon-search"></i>
                            </input>

                    </span>



            </div>
            </form>
        </div>


        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="container">

    <div class="row">
        <br>
        <br>
        <br>
        <br>
        <br>

        <table class="pesquisa table table-condensed">

        </table>
    </div>

</div>

</body>
</html>