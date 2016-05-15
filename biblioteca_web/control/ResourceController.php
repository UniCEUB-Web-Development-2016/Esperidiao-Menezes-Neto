<?php
include_once "model/Request.php";
include_once "control/UserController.php";


class ResourceController
{

    private $controlMap =
        [
            "tb_perfil" => "PerfilController",
            "tb_usuario" => "UserController",
            "ta_livro"=> "LivroController",
            "tb_autor"=>"AutorController",
            "tb_editora"=>"EditoraController",
            "tb_genero"=>"GeneroController",
        ];

    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
    public function searchResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->search($request);
    }
}