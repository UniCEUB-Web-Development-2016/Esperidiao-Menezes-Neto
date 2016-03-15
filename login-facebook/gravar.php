<?php
class Gravar
{

    public function salvar($nome, $sobrenome, $email, $senha, $telefone)
    {
        $arquivo = fopen('arquivo.txt', 'w');

        if ($arquivo == false) die('Nao foi possivel criar o arquivo.');
        fwrite($arquivo, $nome. ',');
        fwrite($arquivo, $sobrenome.',');
        fwrite($arquivo, $email. ',');
        fwrite($arquivo, $senha.',');
        fwrite($arquivo, $telefone.',');
        fclose($arquivo);
    }



}



