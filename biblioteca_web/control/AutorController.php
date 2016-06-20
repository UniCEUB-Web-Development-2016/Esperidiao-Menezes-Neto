<?php
include_once "model/Request.php";
include_once "model/tb_autor.php";
include_once "database/DatabaseConnector.php";

Class AutorController{
    public function register($request){
        $params = $request->get_params();
        $user = new tbAutor(
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
        return $result->fetchAll(PDO::FETCH_ASSOC   );
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
    public function update($request)
    {

        $params = $request->get_params();


        if(!empty($params["idt_autor"]) && !empty($params["nme_autor"]) && !empty($params["dta_nasc_autor"])) {

            $name = addslashes(trim($params["nme_autor"]));
            $data = addslashes(trim($params["dta_nasc_autor"]));
            $id = addslashes(trim($params["idt_autor"]));
            var_dump($name);
            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE bd_biblioteca.tb_autor SET nme_autor = :nme_autor, dta_nasc_autor = :dta_nasc_autor WHERE idt_autor = :idt_autor");
            $result->bindValue(":nme_autor", $name);
            $result->bindValue(":dta_nasc_autor", $data);
            $result->bindValue(":idt_autor", $id);
            $result->execute();
            var_dump($conn);
            if ($result->rowCount() > 0){
                echo "Autor Alterado!";
            } else {
                echo "Autor nÃo atualizado";
            }
        }
    }
    public function delete($request)
    {
        $params = $request->get_params();
        if (!empty($params["idt_autor"])){
            $id = addslashes(trim($params["idt_autor"]));

            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("DELETE FROM tb_autor WHERE idt_autor= :id");
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Autor deletado com Sucesso!";
            } else {
                echo "Autor  não deletado!";
            }
        }
    }
    private function isValid($parameters)
    {
        $keys = array_keys($parameters);
        $diff1 = array_diff($keys, $this->requiredParameters);
        $diff2 = array_diff($this->requiredParameters, $keys);
        if (empty($diff2) && empty($diff1))
            return true;
        return false;
    }
   

}