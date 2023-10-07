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
                            <input type="text" placeholder="Pesquisar">
                        </fieldset>
                        <fieldset>
                            <p>Informação do produto:</p>
                            <select name="txtProduto">
                                <option value="1">Camiseta</option>
                                <option value="2">Blusa</option>
                                <option value="3">Calça</option>
                            </select>
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