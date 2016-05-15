<?php
include_once "model/Request.php";
include_once "tb_autor.php";
include_once "database/Database.php";

Class AutorController{
    public function register($request){
        $params = $request->get_params();
        $user = new tb_autor(
            $params["nme_autor"],
            $params["dta_nasc_autor"]);

        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO tb_autor (nme_autor, dta_nasc_autor) VALUES ('".
            $user->getNmeAutor()."','".
            $user->getDtaNascAutor()."')";

        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT nme_autor, dta_nasc_autor FROM tb_autor WHERE ".$crit);
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