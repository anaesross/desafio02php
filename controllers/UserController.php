<?php
    include_once("models/User.php");

    class UserController{

        public function acao($rotas){
            switch ($rotas) {
                case "formulario-user";
                    $this->formularioUser();
                break; 

                case "login-user";
                    $this->loginUser();
                break;

                case "cadastrar-user";
                    $this->cadastroUser();
                break;

                case "autentica-user"; 
                    $this->autenticaUser();
                    break;                
            }
        }

        private function formularioUser(){
            include "views/cadUser.php";
        }

        private function loginUser(){
            include "views/loginUser.php";
        }

        public function cadastroUser(){
 
            $user = new User();
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
 
            $resultado = $user->criarUser($nome, $email, $login, $senha);
     
            /* echo "<pre>";
            var_dump($resultado);
            exit; */
            if($resultado){
                echo  "<script>alert!('Usuário cadastrado com sucesso!);</script>";
                header('Location:posts');
            }else {
                echo  "<script>alert!('Erro ao cadastrar o usuário!);</script>";
            }
        }

        function autenticaUser(){
            echo 'on';
            if(empty($_POST['nome']) || $_POST['senha']) { //validação se o formulário foi preenchido
                echo "<script>alert!('Usuário ou senha inválidos')</script>";
                    header('Location:formulario-post');
            }
            else {            
                $nome  = $_POST['nome'];
                $senha  = $_POST['senha'];
                
                $dados = autenticaUser($nome, $senha); // chamando método do model
                if(!$dados) { //validação se o nome e senha são iguais do formulário-banco
                    // erro no login
                }
                else {
                    session_start();
                    $_SESSION['fakeig']['user'] = $dados;
                    header('Location:formulario-post');
                }
            }
        }
    }
?>