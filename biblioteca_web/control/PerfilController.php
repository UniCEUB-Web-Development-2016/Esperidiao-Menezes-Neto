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
    public function update($request)
    {

        $params = $request->get_params();


        if(!empty($params["idt_perfil"]) && !empty($params["nme_perfil"])) {

            $name = addslashes(trim($params["nme_perfil"]));

            $id = addslashes(trim($params["idt_perfil"]));
            var_dump($name);
            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE bd_biblioteca.tb_perfil SET nme_perfil = :nme_perfil WHERE idt_perfil = :idt_perfil");
            $result->bindValue(":nme_perfil", $name);

            $result->bindValue(":idt_perfil", $id);
            $result->execute();
            var_dump($conn);
            if ($result->rowCount() > 0){
                echo "Perfil Alterado!";
            } else {
                echo "Perfil nÃo atualizado";
            }
        }
    }
    public function delete($request)
    {
        $params = $request->get_params();
        if (!empty($params["idt_perfil"])){
            $id = addslashes(trim($params["idt_perfil"]));

            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("DELETE FROM tb_perfil WHERE idt_perfil= :id");
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Perfil deletado com Sucesso!";
            } else {
                echo "Perfil não deletado!";
            }
        }
    }
}