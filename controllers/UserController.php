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

                case "cadastro-user";
                    $this->cadastroUser();
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
                echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
                header('location:posts');
            }else{
                echo "<script>alert('Falha ao cadastrar usuário!')</script>";
            }
        }


    }


?>