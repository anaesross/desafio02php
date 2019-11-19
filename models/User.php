<?php 

include("Conexao.php");

class User extends Conexao{

    public function criarUser($nome, $email, $login, $senha){
        try{
            $db= parent::criarConexao();
            $query = $db->prepare("INSERT INTO users (nome, email, login, senha) values (?,?,?,?)");
            return $query->execute([$nome, $email, $login, $senha]);
        } catch (Exception $e){
            echo $e->getMessage();
        }
     
    }
}
?>