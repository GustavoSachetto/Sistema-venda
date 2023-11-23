<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | exibe venda</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/buscaVenda.php');
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
                <section id="busca" class="container-busca">
                    <h3>Venda / exibe</h3>
                    <form method="post" action="">
                        <h2>Buscar vendas</h2>
                        <fieldset>
                            <input type="text" placeholder="Codigo venda" name="txtCodV">
                            <input type="text" placeholder="Cpf cliente" name="txtCpf" minlength="11" maxlength="11">
                            <input type="text" placeholder="Codigo cliente" name="txtCodC">
                            <input type="text" placeholder="Data e hora" name="txtDate" maxlength="30">    
                            <button type="submit" name="envBusca">
                                <i class='bx bx-search'></i>
                                <span>Buscar</span>
                            </button>
                        </fieldset>
                    </form>
                </section>
                <section id="table" class="container-table">
                    <?php include ('../../controller/exibeVenda.php') ?>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>