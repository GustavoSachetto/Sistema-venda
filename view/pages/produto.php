<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir produtos</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
    </head>
    <body>
        <?php require ('../layout/header.php') ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
                        <fieldset>
                            <input type="text" placeholder="Nome" name="txtNome" maxlength="80">
                            <input type="text" placeholder="Categoria" name="txtCategoria" maxlength="30">
                            <input type="text" placeholder="Genero" name="txtGen" minlength="8" maxlength="8" pattern="[0-9]{5}[0-9]{3}">
                            <input type="text" placeholder="Marca" name="txtMarca" minlength="2" maxlength="2" pattern="[aA-zZ]{2}">
                            <input type="text" placeholder="Tipo" name="txtTipo" maxlength="30">    
                            <input type="text" placeholder="Codigo produto" name="txtCod">
                            <button type="submit">Buscar</button>
                        </fieldset>
                    </form>
                </section>
                <section><?php include ('../../controller/exibeProduto.php') ?></section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>