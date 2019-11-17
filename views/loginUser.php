<?php
    include_once("includes/header.php");
?>
<main class="container mt-5">
    <h1>Faça seu login:</h1>
    <form method="POST" action="login-user">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Login:</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label>Senha:</label>
                <input type="password" class="form-control" name="senha" placeholder="Crie sua senha de acesso">
            </div>

        </div>

        <div class="row d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            <a href="cadastrar-user" class="btn btn-outline-success">Não é cadastrado? Clique Aqui!</a>
        </div>
    </form>
</main>