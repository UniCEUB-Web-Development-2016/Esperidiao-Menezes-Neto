<?php
include_once "model/Request.php";
include_once "model/tb_perfil.php";
include_once "database/DatabaseConnector.php";
class PerfilController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new tb_perfil(
            $params["nme_perfil"]);

        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO tb_perfil (nme_perfil) VALUES ('".
            $user->getNmePerfil()."')";

        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT nme_perfil FROM tb_perfil WHERE ".$crit);
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