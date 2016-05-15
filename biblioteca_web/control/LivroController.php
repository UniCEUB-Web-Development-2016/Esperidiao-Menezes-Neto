<?php
include_once "model/Request.php";
include_once "model/tb_livro.php";
include_once "database/DatabaseConnector.php";
class LivroController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new tb_livro(
            $params["cod_autor"],
            $params["cod_editora"],
            $params["cod_genero"],
            $params["nme_livro"],
            $params["dta_public_livro"],
            $params["caminho_livro"]);
        $db = new DatabaseConnector("localhost", "bd_biblioteca", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO tb_livro (cod_autor, cod_editora, cod_genero, nme_livro, dta_public_livro, caminho_livro) VALUES ('".
            $user->getCodAutor()."','".
            $user->getCodEditora()."','".
            $user->getCodGenero()."','".
            $user->getNmeLivro()."','".
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
        $result = $conn->query("SELECT cod_autor, cod_editora, cod_genero, nme_livro, dta_public_livro, caminho_livro FROM tb_livro WHERE ".$crit);
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