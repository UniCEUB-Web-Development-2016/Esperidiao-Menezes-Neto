<?php
include_once "model/Request.php";
include_once "model/ta_livro.php";
include_once "database/DatabaseConnector.php";
class LivroController
{
    public function register($request)
    {
        $params = $request->get_params();

        $user = new taLivro(
            $params["nme_livro"],
            $params["dta_public_livro"],
            $params["caminho_livro"],
            $params["cod_autor"],
            $params["cod_editora"],
            $params["cod_genero"]);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();

$resultado = $conn->query($this->generateInsertQuery($user));
        if($resultado = true){
            return true;
        }else{
            return false;
        }
        ;
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO ta_livro (cod_autor, cod_editora, cod_genero, nme_livro, dta_public_livro, caminho_livro) VALUES ('".
            $user->getCodAutor()."','".
            $user->getCodEditora()."','".
            $user->getCodGenero()."','".
            $user->getNome()."','".
            $user->getDtaPublicLivro()."','".
            $user->getCaminhoLivro()."')";

       
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT cod_autor, cod_editora, cod_genero, nme_livro, dta_public_livro, caminho_livro FROM ta_livro WHERE ".$crit);
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


        if(!empty($params["idt_livro"]) && !empty($params["nme_livro"]) && !empty($params["dta_public_livro"])) {

            $name = addslashes(trim($params["nme_livro"]));
            $data = addslashes(trim($params["dta_public_livro"]));
            $id = addslashes(trim($params["idt_livro"]));
var_dump($name);
            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE bd_biblioteca.ta_livro SET nme_livro = :nme_livro, dta_public_livro = :dta_public_livro WHERE idt_livro = :idt_livro");
            $result->bindValue(":nme_livro", $name);
            $result->bindValue(":dta_public_livro", $data);
            $result->bindValue(":idt_livro", $id);
            $result->execute();
            var_dump($conn);
            if ($result->rowCount() > 0){
                echo "Livro Alterado!";
            } else {
                echo "Livro nÃo atualizado";
            }
        }
    }
    public function delete($request)
    {
        $params = $request->get_params();
        if (!empty($params["idt_livro"])){
            $id = addslashes(trim($params["idt_livro"]));

            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("DELETE FROM ta_livro WHERE idt_livro= :id");
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Livro deletado com Sucesso!";
            } else {
                echo "Livro não deletado!";
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