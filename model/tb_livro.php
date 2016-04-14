<?php

class tbLivro
{

    var $nome;
    var $dta_public_livro;
    var $caminho_livro;
    var $cod_autor;
    var $cod_editora;
    var $cod_genero;

    public function __construct($nome, $dta_public_livro, $caminho_livro, $cod_autor, $cod_editora, $cod_genero)
    {
        self::setNome($nome);
        self::setDta_public_livro($dta_public_livro);
        self::setCaminhoLivro($caminho_livro);
        self::setCodAutor($cod_autor);
        self::setCodEditora($cod_editora);
        self::setCodGenero($cod_genero);

    }

    public function getNome()
    {
    return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getDtaPublicLivro(){
        return $this->dta_public_livro;
    }
    public function setDtaPublicLivro($dta_public_livro){
         $this->dta_public_livro = $dta_public_livro;
    }

    public function getCodEditora()
    {
        return $this->cod_editora;
    }
    public function setCodEditora($cod_editora){
        $this->cod_editora=$cod_editora;
    }

    public function getCodAutor()
    {
        return $this->cod_autor;
    }
    public function setCodAutor ($cod_autor){
        $this->cod_autor=$cod_autor;
    }

    public function getCaminhoLivro()
    {
        return $this->caminho_livro;
    }
    public function setCaminhoLivro($caminho_livro){
        $this->caminho_livro=$caminho_livro;
    }
    public function getCodGenero(){
        return $this->cod_genero;
    }
    public function setCodGenero($cod_genero){
        $this->cod_genero=$cod_genero;
    }
}
