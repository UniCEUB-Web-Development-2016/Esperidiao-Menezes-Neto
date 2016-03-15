<?php
include "gravar.php";

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];


$txt = new Gravar();
$txt ->salvar($nome,$sobrenome
    ,$email,$senha,$telefone);