<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro tamanho</title>
    </head>
    <body>
        <?php require ('../layout/header.php') ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
                        <h2>Cadastro tamanho</h2>
                        <fieldset>
                            <p>Informação do tamanho:</p>
                            <input type="text" placeholder="Tamanho" name="txtTamanho" minlength="1" maxlength="5" pattern="[aA-zZ]+" required>
                        </fieldset>
                        <button type="submit" id="btnSubmit">Enviar</button>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>