<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | editar estoque</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
        <script src="../js/form.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/alteraEstoque.php');
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
                    <h3>Estoque / editar</h3>
                    <form method="post" action="">
                        <h2>Editar estoque</h2>
                        <fieldset id="estoque">
                            <p>Informações do produto:</p><br>
                            <input type="text" placeholder="Nome estoque" value="<?= $estoque[0]['nomeProduto']?>" class="readonly" name="txtNomeP" minlength="4" maxlength="70" required readonly>
                            <input type="number" placeholder="Valor" value="<?= $estoque[0]['valor']?>" class="readonly" name="txtValor" min="1" max="99999.99" step="0.01" required readonly>
                            <input type="text" placeholder="Categoria" value="<?= $estoque[0]['categoria']?>" class="readonly" name="txtCat" minlength="4" maxlength="30" required readonly>
                            <input type="text" placeholder="Genero" value="<?= $estoque[0]['genero']?>" class="readonly" name="txtGen" minlength="4" maxlength="10" required readonly>
                            <input type="text" placeholder="Tipo" value="<?= $estoque[0]['tipo']?>" class="readonly" name="txtTipo" minlength="4" maxlength="30" required readonly>
                            <input type="text" placeholder="Marca" value="<?= $estoque[0]['marca']?>" class="readonly" name="txtMarca" minlength="4" maxlength="30" required readonly>
                        </fieldset>
                        <fieldset id="tamanho">
                            <p>Informações do tamanho produto:</p><br>
                            <select name="slcTamanho" required>
                                <option value="<?= $estoque[0]['codTam']?>"><?= $estoque[0]['tipoTamanho']?></option>
                                <?php opcoesT($tamanhos)?>
                            </select>
                            <input type="number" placeholder="Quantidade" value="<?= $estoque[0]['quantidade']?>" name="txtQuantidade" required>
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