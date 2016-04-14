<?php
class tbAutor{
    var $nme_autor;
    var $dta_nasc_autor;


public function __construct($nme_autor, $dta_nasc_autor)
{
    self::setNmeAutor($nme_autor);
    self::setDtaNascAutor(($dta_nasc_autor));
}
    public function getNmeAutor()
{
    return $this->nme_autor;
}
    public function setNmeAutor($nme_autor){
        $this->nme_autor=$nme_autor;
    }
    public function getDtaNascAutor(){
    return $this->dta_nasc_autor;
}
    public function setDtaNascAutor($dta_nasc_autor){
        $this->dta_nasc_autor=$dta_nasc_autor;
    }


}