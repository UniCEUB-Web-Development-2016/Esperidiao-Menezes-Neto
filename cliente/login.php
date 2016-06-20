<?php
include_once "httpful.phar";

if(!empty($_GET['email_usuario']) && !empty($_GET['senha_usuario'])){
    session_start();
    
    $resposta = \Httpful\Request::get("http://localhost/biblioteca_web/login/?email_usuario=".$_GET['email_usuario']."&senha_usuario=".$_GET['senha_usuario'])->send();
    //var_dump($resposta);
    $resouse = json_decode($resposta->body);

    $_SESSION["user"] = json_encode($resouse);

    header('Location: ../telaInicio.html');
}



