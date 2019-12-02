<?php 

include("Conexao.php");

class User extends Conexao{

    public function criarUser($nome, $email, $senha){
        try{
            $db= parent::criarConexao();
            $query = $db->prepare("INSERT INTO users (nome, email, senha) values (?,?,?)");
            return $query->execute([$nome, $email, $senha]);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function autenticarUser($email, $senha){
        try{
            $db = parent::criarConexao();
            $query = $db->prepare("SELECT * FROM users WHERE email = ? AND senha = ?");
            $query->execute([$email,$senha]); //(PDO)->obj
            $ret = $query->fetchAll(PDO::FETCH_ASSOC);
           /*  var_dump($ret); die; */// array-assoc*
            if(count($ret) > 0) { // login ok
                return $ret[0]; //primeiro índice do array, busca o login e a senha que foi digitado.
            }
            else {
                return false;
            }
        } 
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function carregarDados($id){
        try{
            $db = parent::criarConexao();
            $query = $db->prepare("SELECT * FROM users WHERE id= '$id'");
            $query->execute([$id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
?>