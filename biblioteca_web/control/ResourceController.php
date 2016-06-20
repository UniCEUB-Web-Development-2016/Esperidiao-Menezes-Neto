<?php
include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/PerfilController.php";
include_once "control/LivroController.php";
include_once "control/AutorController.php";
include_once "control/EditoraController.php";
include_once "control/GeneroController.php";
include_once "control/LoginController.php";

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
            "login"=>"LoginController",
        ];

    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
    public function searchResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->search($request);
    }

    public function updateResource($request)
    {
        return (new $this->controlMap[strtolower($request->get_resource())]())->update($request);
    }
    public function deleteResource($request)
    {
        return (new $this->controlMap[strtolower($request->get_resource())]())->delete($request);
    }
    

}