<?php include_once("includes/header.php"); ?>
<main class="container mt-5">
    <h1>Cadastra-se preenchendo o formulário abaixo: </h1>
        <form method="POST" action="cadastrar-user">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label>E-mail:</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label>Login:</label>
                    <input type="text" class="form-control" name="login" placeholder="Crie seu login de acesso">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <label>Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Crie sua senha de acesso">
                </div>
            </div>
            <div class="row d-flex justify-content-end align-items-end">
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            </div>
        </form>

</main>