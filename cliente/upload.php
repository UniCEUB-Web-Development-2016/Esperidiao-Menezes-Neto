<?php
//var_dump($_POST);
echo "<br>";



include_once "httpful.phar";


$diretorio = '/Livros/';



if($_FILES){
    if($_FILES['fileToUpload']){
        $nome = $_FILES['fileToUpload']['name'];
        $gerarNome = geraNome($nome);

        if($gerarNome != false){
            $dir = '../biblioteca_web'.$diretorio;
            $tmpNome = $_FILES['fileToUpload']['tmp_name'];
            $name = $_FILES['fileToUpload']['name'] = $gerarNome;

            $request = "http://localhost/biblioteca_web/ta_livro/?cod_autor=".$_POST['nme_autor'].
                "&cod_editora=".$_POST['nme_editora'].
                "&cod_genero=".$_POST['nme_genero'].
                "&nme_livro=".$_POST['nme_livro'].
                "&dta_public_livro=".$_POST['dta_public_livro'].
                "&caminho_livro=".$gerarNome;

            //$resutado = $controle->insert_musica($nomeMusica, $codCanal,$diretorio.$name);
            $resultado = \Httpful\Request::post($request)->send();
            if($resutado = true) {
                if (move_uploaded_file($tmpNome, $dir . $name)) {
                    //echo 'O livro foi adicionado';
                    header( 'Location: http://localhost/cliente/Livros.html');
                } else {
                    echo 'O livro não foi adcionado';
                    //header( 'Location: ../../public/templates/genrenciarCanal.php?resultado=2&id='.$codCanal);
                }
            }else{
                echo 'O livro não foi adcionado';
                //header( 'Location: ../../public/templates/genrenciarCanal.php?resultado=2&id='.$codCanal);
            }

        }else{
            echo 'O arquivo não é um pdf';
            //header( 'Location: ../../public/templates/genrenciarCanal.php?resultado=3&id='.$codCanal);
        }
    }
}else{
    echo 'Não contem nenhum arquivo';
    //header( 'Location: ../../public/templates/genrenciarCanal.php?resultado=4&id='.$codCanal);
}

function pegaExtensao($arquivo){
    $ext = explode('.',$arquivo);
    if($ext[1] == 'pdf'){
        return '.'.$ext[1];
    }else{
        return false;
    }
}
function geraNome($arquivo){
    if($verificar = pegaExtensao($arquivo) == '.pdf'){
        $geraNome = uniqid(rand(), true);
        return $geraNome.'.pdf';
    }else{
        return false;
    }
}