<?php 
    $user = $_REQUEST['nome'];
    $posts = $_REQUEST['posts'];

?> 
<?php include "includes/header.php"; ?>
    <main class="board">
        <?php foreach($posts as $post): ?>
            <div class="card mt-5">
                    <img id="cardimg" src="<?php echo $post->imagem; ?>" alt="Card image cap">
                <div class="card-body">
                        <p class="card-text">
                            <?php echo $post->descricao; ?>
                        </p>
                </div>
            <p class="card-text d-flex justify-content-end">
                <?= $user->login ?>
            </p>
            </div>
        <?php endforeach; ?>
            <a class="float-button" href="formulario-post">&#10010;</a>
    </main>