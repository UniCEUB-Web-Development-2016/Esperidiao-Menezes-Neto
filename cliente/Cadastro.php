<?php
include_once "httpful.phar";

//if (!empty($_POST['nme_usuario']) && !empty($_POST['email_usuario'])
//        && !empty($_POST['dta_nasc_usuario']) && !empty($_POST['senha_usuario'])){

    $resposta = \Httpful\Request::post("http://localhost/biblioteca_web/tb_usuario/?nme_usuario=".$_POST['nme_usuario'].
        "&email_usuario=".$_POST['email_usuario'].
        "&dta_nascimento=".$_POST['dta_nascimento'].
        "&senha_usuario=".$_POST['senha_usuario'].
    "&cod_perfil=".$_POST['cod_perfil'])->send();

echo $resposta;
//}