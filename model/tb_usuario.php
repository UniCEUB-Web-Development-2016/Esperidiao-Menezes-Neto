<?php
class tbUsuario
{
    var $cod_perfil;
    var $nme_usuario;
    var $email_usuario;
    var $dta_nascimento;
    var $senha_usuario;

    public function __construct($cod_perfil, $nme_usuario, $email_usuario, $dta_nascimento, $senha_usuario)
    {
        self::setCodPerfil($cod_perfil);
        self::setNmeUsuario($nme_usuario);
        self::setEmailUsuario($email_usuario);
        self::setDtaNascimento($dta_nascimento);
        self::setSenhaUsuario($senha_usuario);

    }
    public function getCodPerfil (){
    return $this->cod_perfil;
    }
    public function setCodPerfil ($cod_perfil){
        $this->cod_perfil=$cod_perfil;
    }
    public function getNmeUsuario (){
    return $this->nme_usuario;
    }
    public function setNmeUsuario ($nme_usuario){
        $this->nme_usuario=$nme_usuario;
    }
    public function getEmailUsuario(){
        return $this->email_usuario;
    }
    public function setEmailUsuario ($email_usuario){
        $this->email_usuario=$email_usuario;
    }
    public function getDtaNascimento (){
        return $this->dta_nascimento;
    }
    public function setDtaNascimento ($dta_nascimento){
        $this->dta_nascimento=$dta_nascimento;
    }
    public function getSenhaUsuario(){
        return $this->senha_usuario;
    }
    public function setSenhaUsuario($senha_usuario){
        $this->senha_usuario=$senha_usuario;
    }
}
