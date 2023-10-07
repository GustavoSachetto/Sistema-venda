<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro produto</title>
        <?php require ('../layout/head.php') ?>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/recebeProduto.php');
        ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
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
                        <fieldset>
                            <p>Informações do tamanho produto:</p><br>
                            <select name="slcTamanho">
                                <?php opcoes($resultado)?>
                            </select>
                            <input type="number" placeholder="Quantidade" name="txtQuantidade" required>
                        </fieldset>
                        <button type="submit">Enviar</button>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>