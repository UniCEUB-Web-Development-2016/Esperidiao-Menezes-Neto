<?php
include_once "model/Request.php";
include_once "model/tb_usuario.php";
include_once "database/DatabaseConnector.php";
class UserController
{
    public function register($request)
    {
  
            $params = $request->get_params();
            $user = new tbUsuario(
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
    public function update($request)
    {

        $params = $request->get_params();


        if(!empty($params["idt_usuario"]) && !empty($params["nme_usuario"]) && !empty($params["email_usuario"]) && !empty($params["dta_nascimento"]) && !empty($params["senha_usuario"])) {

            $name = addslashes(trim($params["nme_usuario"]));
            $email = addslashes(trim($params["email_usuario"]));
            $data = addslashes(trim($params["dta_nascimento"]));
            $senha = addslashes(trim($params["senha_usuario"]));
            $id = addslashes(trim($params["idt_usuario"]));
            var_dump($name);
            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE bd_biblioteca.tb_usuario SET nme_usuario = :nme_usuario, dta_nascimento = :dta_nascimento, email_usuario = :email_usuario, senha_usuario = :senha_usuario WHERE idt_usuario = :idt_usuario");
            $result->bindValue(":nme_usuario", $name);
            $result->bindValue(":dta_nascimento", $data);
            $result->bindValue(":email_usuario", $email);
            $result->bindValue(":senha_usuario", $senha);
            $result->bindValue(":idt_usuario", $id);
            $result->execute();
            var_dump($conn);
            if ($result->rowCount() > 0){
                echo "Usuário alterado!";
            } else {
                echo "Usuário não atualizado";
            }
        }
    }
    public function delete($request)
    {
        $params = $request->get_params();
        if (!empty($params["idt_usuario"])){
            $id = addslashes(trim($params["idt_usuario"]));

            $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("DELETE FROM tb_usuario WHERE idt_usuario= :id");
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Usuario deletado com Sucesso!";
            } else {
                echo "Usuario não deletado!";
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