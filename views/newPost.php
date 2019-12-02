<?php include "includes/header.php"; ?>
    <main class="board mt-3">
        <h1> Cadastro de novo Post </h1>
        <form action="cadastrar-post" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['fakeig']['user']['id']?>"/>
            <div class="form-group">
                <label for="exampleFormControlFile1">Selecione uma imagem</label>
                <input type="file" class="form-control-file" name="imagem" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Insira uma descrição">
            </div>
            <button type="submit" class="btn btn-success">Postar</button>
        </form>

    </main>