<?php
class tb_perfil{
    var $nme_perfil;

    public function __construct($nme_perfil)
    {
     self::setNmePerfil($nme_perfil);
    }

    public function getNmePerfil()
    {
        return $this->nme_perfil;
    }

    public function setNmePerfil($nme_perfil)
    {
        $this->nme_perfil = $nme_perfil;
    }
}
