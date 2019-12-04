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

                case "logout-user"; 
                    $this->logoutUser();
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
            $senha = $_POST['senha'];
 
            $resultado = $user->criarUser($nome, $email, $senha);
     
            /* echo "<pre>";
            var_dump($resultado);
            exit; */
            if($resultado){
                echo  "<script>alert('Usuário cadastrado com sucesso!);</script>";
                header('Location:posts');
            }else {
                echo  "<script>alert('Erro ao cadastrar o usuário!);</script>";
            }
        }

        public function logoutUser(){
                session_start();
            if(isset($_SESSION['fakeig']['user'])){
                session_destroy();
                header('Location:login-user');
            }
        }

        public function autenticaUser(){
            if(empty($_POST['email']) || empty($_POST['senha'])) { //validação se o formulário foi preenchido
                echo  "<script>alert('Favor preencher os campos informados');</script>";
                header('Location:formulario');
            }
            else {            
                $email  = $_POST['email'];
                $senha  = $_POST['senha'];
            }  

            // var_dump($senha);
            // die; 
            
            $user = new User();

            $dados = $user->autenticarUser($email, $senha); // chamando método do model

            
            if($dados) { //validação se o nome e senha são iguais do formulário-banco
                session_start();
                $_SESSION['fakeig']['user'] = $dados;
                header('Location:formulario-post');
            }
            else {
                echo  "<script>alert('Usuário ou senha inválidos');</script>";
            }
        }
    }
?>