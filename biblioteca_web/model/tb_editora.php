<?php
class tbEditora{

    var $nme_editora;

    public function __construct($nme_editora){
    self:: setNmeEditora($nme_editora);
    }
    public function getNmeEditora(){
        return $this->nme_editora;
    }
    public function setNmeEditora($nme_editora){
        $this->nme_editora=$nme_editora;
    }


}