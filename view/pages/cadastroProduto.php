<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro produto</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/recebeProduto.php');
        ?>
        <main>
            <article>
                <section>
                    <div class="container-user">
                        <i class='bx bxs-user-circle'></i>
                        <div class="user">
                            <span>Douglas junior</span>
                            <span class="type-user">ADMIN</span>
                        </div>
                    </div>
                </section>
                <section>
                    <h3>Cliente / produto</h3>
                    <form method="post" action="?codProduto=<?= $codProduto ?>">
                        <h2>Cadastro produto</h2>
                        <fieldset id="produto">
                            <p>Informações do produto:</p><br>
                            <input type="text" placeholder="Nome produto" name="txtNomeP" minlength="4" maxlength="70" required>
                            <input type="number" placeholder="Valor" name="txtValor" min="1" max="99999.99" step="0.01" required>
                            <input type="text" placeholder="Categoria" name="txtCat" minlength="4" maxlength="30" required>
                            <input type="text" placeholder="Genero" name="txtGen" minlength="4" maxlength="10" required>
                            <input type="text" placeholder="Tipo" name="txtTipo" minlength="4" maxlength="30" required>
                            <input type="text" placeholder="Marca" name="txtMarca" minlength="4" maxlength="30" required>
                        </fieldset>
                        <hr>
                        <div class="container-button">
                            <button type="reset"><i class='bx bx-trash'></i> <span>Limpar</span></button>
                            <button type="submit"><i class='bx bx-message-square-add'></i> <span>Cadastrar</span></button>
                        </div>
                    </form>
                </section>
                <section>                
                    <h3>Cliente / tamanho</h3>
                    <form method="post" action="">
                        <h2>Cadastro tamanho</h2>
                        <fieldset>
                            <p>Informações do tamanho produto:</p><br>
                            <select name="slcTamanho">
                                <?php opcoes($tamanhos)?>
                            </select>
                            <input type="number" placeholder="Quantidade" name="txtQuantidade" required>
                        </fieldset>
                        <hr>
                        <div class="container-button">
                            <button type="reset"><i class='bx bx-trash'></i> <span>Limpar</span></button>
                            <button type="submit"><i class='bx bx-message-square-add'></i> <span>Cadastrar</span></button>
                        </div>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>
