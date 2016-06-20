<?php
include_once "model/Request.php";
include_once "model/tb_editora.php";
include_once "database/DatabaseConnector.php";
class EditoraController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new tb_editora(
            $params["nme_editora"]);

        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO tb_editora (nme_editora VALUES ('".
            $user->getNmeEditora()."')";

        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT nme_editora FROM tb_editora WHERE ".$crit);
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


        if(!empty($params["idt_editora"]) && !empty($params["nme_editora"])){

            $name = addslashes(trim($params["nme_editora"]));

            $id = addslashes(trim($params["idt_editora"]));
            var_dump($name);
            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE bd_biblioteca.tb_editora SET nme_editora = :nme_editora WHERE idt_editora = :idt_editora");
            $result->bindValue(":nme_editora", $name);
            $result->bindValue(":idt_editora", $id);
            $result->execute();
            var_dump($conn);
            if ($result->rowCount() > 0){
                echo "Editora Alterado!";
            } else {
                echo " Editora nÃo atualizado";
            }
        }
    }
    public function delete($request)
    {
        $params = $request->get_params();
        if (!empty($params["idt_editora"])){
            $id = addslashes(trim($params["idt_editora"]));

            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("DELETE FROM tb_editora WHERE idt_editora= :id");
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Editora deletada com Sucesso!";
            } else {
                echo "Editora não deletada!";
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