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
    
    public function autenticaUser($nome, $senha){
        try{
            $db = parent::criarConexao();
            $query = $db->prepare("SELECT * FROM users WHERE nome = ? AND senha = ?");
            $rs = $query->execute([$nome,$senha]); //(PDO)
            $ret = $rs->fetchAll(PDO::FETCH_ASSOC);
            var_dump($ret);

            /*
            ARARAY []

            $arr = [];

            $arr[0] = 1;
            $arr[1] = 1;
            $arr[2] = 1;
            $arr[3] = 1;
            $arr[4] = 1;
            $arr[5] = 1;

            */

            /*
            arr[] = [
                    'id' => 12
                    'nome' => 'anae',
                    'senha' => ' anae1',
            ];
            arr[] = [
                    'id' => 12
                    'nome' => 'anae',
                    'senha' => ' anae1',
            ];
            arr[] = [
                    'id' => 12
                    'nome' => 'anae',
                    'senha' => ' anae1',
            ];

            $var = 'anae.soares';
            $r = splir('.', $var);

            $r[0] => anae;
            $r[1] => soares;

            */

            /*ARRAY [0]
                => [
                    'id' => 12
                    'nome' => 'anae',
                    'senha' => ' anae1',
                ]*/

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
}
?>