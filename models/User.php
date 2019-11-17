<?php 

include("Conexao.php");

class User extends Conexao{

    public function criarUser($nome, $email, $login, $senha){
        $db= parent::criarConexao();
        $query = $db->prepare("INSERT INTO users (nome, email, login, senha");
        return $query->execute([$nome, $email, $login, $senha]);
    }
}
?>