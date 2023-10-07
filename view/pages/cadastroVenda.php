<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro venda</title>
        <?php require ('../layout/head.php') ?>
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/recebeVenda.php');
        ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
                        <h2>Cadastro venda</h2>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>