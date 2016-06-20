<?php
include_once "model/Request.php";
include_once "database/DatabaseConnector.php";

class LoginController{
    public function search($request)
    {

        $params = $request->get_params();

        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "3306", "root", "");
        $conn = $db->getConnection();
        $result = $conn->prepare("SELECT * FROM tb_usuario WHERE email_usuario=:email_usuario AND senha_usuario = :senha_usuario");
        $result->bindParam(':email_usuario',$params['email_usuario']);
        $result->bindParam(':senha_usuario',$params['senha_usuario']);
        $result->execute();

        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $encode = $row;
            }
        }else{
                $encode = false;
        }
         return $encode;
        //foreach($result as $row)

    }
}