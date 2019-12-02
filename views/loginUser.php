<?php
    include_once("includes/header.php");
?>
<main class="container mt-5">
    <h1>Faça seu login:</h1>
    <form method="POST" action="autentica-user">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Login:</label>
                <input type="text" class="form-control" name="email" placeholder="Digite seu nome">
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Senha:</label>
                <input type="password" class="form-control" name="senha" placeholder="Crie sua senha de acesso">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-2">
            <button type="submit" class="btn btn-outline-success">Acessar</button>
        </div><br>
        <div class="d-flex justify-content-center align-items-center">
            <a href="formulario-user" class="btn btn-outline-success">Não é cadastrado? Clique Aqui!</a>
        </div>

    </form>
</main>
