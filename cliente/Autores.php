<?php
include_once "httpful.phar";
if(!empty($_GET['pesquisa'])){
    $resposta = \Httpful\Request::get("http://localhost/biblioteca_web/tb_autor/?nme_autor=".$_GET['pesquisa'])->send();
    //var_dump($resposta);
    $resouse = json_decode($resposta->body);

echo $resposta->body;
    //header('Location: ../livros.html');
}