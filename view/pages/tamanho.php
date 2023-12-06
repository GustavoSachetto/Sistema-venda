<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | exibe tamanho</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
    </head>
    <body>
    <?php require ('../layout/header.php') ?>
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
                <section>
                    <h3>Tamanho / exibe</h3>
                </section>
                <section id="table" class="container-table">
                    <h2>Exibe tamanhos</h2>
                    <?php include ('../../controller/exibeTamanho.php') ?>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>