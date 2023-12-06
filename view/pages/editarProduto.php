<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | editar produto</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
        <script src="../js/form.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/alteraProduto.php');
        ?>
        <main>
            <article>
                <section id="user">
                    <div class="container-user">
                        <i class='bx bxs-user-circle'></i>
                        <div class="user">
                            <span>Douglas junior</span>
                            <span class="type-user">ADMIN</span>
                        </div>
                    </div>
                </section>
                <section id="form">
                    <h3>Produto / editar</h3>
                    <form method="post" action="">
                        <h2>Editar produto</h2>
                        <fieldset id="produto">
                            <p>Informações do produto:</p><br>
                            <input type="text" placeholder="Nome produto" value="<?= $produto[0]['nomeProduto']?>" name="txtNomeP" minlength="4" maxlength="70" required>
                            <input type="number" placeholder="Valor" value="<?= $produto[0]['valorCusto']?>" name="txtValorC" min="1" max="99999.99" step="0.01" required>
                            <input type="number" placeholder="Valor" value="<?= $produto[0]['valorVenda']?>" name="txtValorV" max="99999.99" step="0.01" required>
                            <input type="text" placeholder="Categoria" value="<?= $produto[0]['categoria']?>" name="txtCat" minlength="4" maxlength="30" required>
                            <input type="text" placeholder="Genero" value="<?= $produto[0]['genero']?>" name="txtGen" minlength="4" maxlength="10" required>
                            <input type="text" placeholder="Tipo" value="<?= $produto[0]['tipo']?>" name="txtTipo" minlength="4" maxlength="30" required>
                            <input type="text" placeholder="Marca" value="<?= $produto[0]['marca']?>" name="txtMarca" minlength="4" maxlength="30" required>
                        </fieldset><hr>
                        <div class="container-button">
                            <button type="reset">
                                <i class='bx bx-trash'></i>
                                <span>Limpar</span>
                            </button>
                            <button type="submit" name="atualizar">
                                <i class='bx bx-message-square-add'></i>
                                <span>Atualizar</span>
                            </button>
                        </div>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>