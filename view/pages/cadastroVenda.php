<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro venda</title>
    </head>
    <body>
        <?php require ('../layout/header.php') ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
                        <h2>Cadastro venda</h2>
                        <fieldset>
                            <p>Informação do cliente:</p>
                            <form action="" method="get">
                                <input type="text" name="txtBuscaCliente" placeholder="Pesquisar">
                                <button type="submit">Buscar</button>
                            </form>
                        </fieldset>
                        <fieldset>
                            <p>Informação do produto:</p>
                            <form action="" method="get">
                                <input type="text" name="txtBuscaProduto" placeholder="Pesquisar">
                                <button type="submit">Buscar</button>
                            </form>
                            <input type="number" placeholder="Quantidade" name="txtQuantidade" required>
                        </fieldset>
                        <button type="submit" id="btnSubmit">Enviar</button>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>