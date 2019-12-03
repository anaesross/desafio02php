<?php
require_once "Conexao.php";

class Post extends Conexao {


    public function criarPost($image, $descricao, $idUser){
        $db = parent::criarConexao();

        $query = "INSERT INTO posts (imagem, descricao, id_usuario) values(?,?, ?)"; 
        $query = $db->prepare($query); 
        
        return $query->execute([$image, $descricao, $idUser]);
    }

    public function listarPosts(){
        
        $db = parent::criarConexao();
        $sql = 'SELECT p.id_post, 
                            p.imagem, 
                            p.descricao, 
                            u.nome,
                            ( /* contar o total de números de linhas (registros) que será igual a quantidade de likes */
                                SELECT count(*) FROM likes l WHERE l.id_post = p.id_post
                            ) as likes /* subquery => deve retornar uma unica linha e uma unica coluna. */ 
                        FROM posts p, 
                                users u 
                    WHERE p.id_usuario = u.id
                    ORDER BY id_post';

        $query = $db->query($sql);
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }

    public function like($post_id, $user_id)
    {
        $db = parent::criarConexao();
        $query = 'INSERT INTO likes (id_usuario, id_post) VALUES(?, ?)';
        
        $query = $db->prepare($query); 
        return $query->execute([$user_id, $post_id]);
    }
}