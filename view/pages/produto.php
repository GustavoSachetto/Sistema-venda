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
                            <input type="text" placeholder="Categoria" name="txtCate" maxlength="30">
                            <input type="text" placeholder="Genero" name="txtGen" maxlength="10">
                            <input type="text" placeholder="Marca" name="txtMarca" maxlength="30">
                            <input type="text" placeholder="Tipo" name="txtTipo" maxlength="30">    
                            <input type="text" placeholder="Codigo produto" name="txtCod">
                            <button type="submit" name="envBusca">Buscar</button>
                        </fieldset>
                    </form>
                </section>
                <section>
                    <?php 
                        include ('../../controller/exibeProduto.php'); 
                        include ('../../controller/alteracaoProduto.php');
                    ?>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>