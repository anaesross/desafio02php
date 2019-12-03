<?php 
include_once "models/Post.php";
include_once "models/User.php";

class PostController {

    public function acao($rotas){
        
        switch($rotas){
            case "posts":
               $this->listarPosts();
            break;
            case "formulario-post":
                $this->viewFormularioPost();
            break;
            case "cadastrar-post":
                $this->cadastroPost();
            break;
            case "like-post":                 
                $this->like();
            break;
        }
    }

    private function viewFormularioPost(){
        include "views/newPost.php";
    }

    private function viewPosts(){
        include "views/posts.php";
    }

    private function cadastroPost(){
        $post = new Post();
        $descricao = $_POST['descricao'];
        $nomeArquivo = $_FILES['imagem']['name'];
        $linkTemp = $_FILES['imagem']['tmp_name'];
        $caminhoSalvar = "views/img/$nomeArquivo";
        move_uploaded_file($linkTemp, $caminhoSalvar);
       
        session_start();
        
        $resultado = $post->criarPost($caminhoSalvar, $descricao, $_SESSION['fakeig']['user']['id']);

        if($resultado){             
            echo  "<script>alert!('Post cadastrado com sucesso!);</script>";
            header ('Location:posts');
        }else {             
            echo  "<script>alert!('Erro ao cadastrar o post!);</script>";
            header('Location:formulario-post');
        }
    }

    private function listarPosts(){         
        $post = new Post();
        $listaPosts = $post->listarPosts();          
        $_REQUEST['posts'] = $listaPosts;
        $this->viewPosts();
    }

    private function like()     
    {
        session_start(); 
        $post_id = $_POST['post_id'];
        $post = new Post();
        $rs = $post->like($post_id, $_SESSION['fakeig']['user']['id']);

        header ('Location:posts');
    }
}