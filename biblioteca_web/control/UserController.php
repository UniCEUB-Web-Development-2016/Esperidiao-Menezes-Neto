<?php
include_once "model/Request.php";
include_once "model/tb_usuario.php";
include_once "database/DatabaseConnector.php";
class UserController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new tb_usuario(
            $params["cod_perfil"],
            $params["nme_usuario"],
            $params["email_usuario"],
            $params["dta_nascimento"],

            $params["senha_usuario"]);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO tb_usuario (cod_perfil, nme_usuario, email_usuario, dta_nascimento, senha_usuario) VALUES ('".
            $user->getCodPerfil()."','".
            $user->getNmeUsuario()."','".
            $user->getEmailusuario()."','".
            $user->getDtaNascimento()."','".

            $user->getSenhaUsuario()."')";
        return $query;
    }
    public function search($request)
    {

        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "3306", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT cod_perfil, nme_usuario, email_usuario, dta_nascimento, senha_usuario FROM tb_usuario WHERE ".$crit);
        //foreach($result as $row)
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
    }
}