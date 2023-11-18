<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | cadastro tamanho</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/recebeTamanho.php');
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
                    <h3>Cliente / tamanho</h3>
                    <form method="post" action="">
                        <h2>Cadastro tamanho</h2>
                        <fieldset>
                            <p>Informação do tamanho:</p><br>
                            <input type="text" placeholder="Tamanho" name="txtTamanho" minlength="1" maxlength="5" pattern="[aA-zZ]+" required>
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
        <?php require ('../layout/footer.php') ?>
    </body>
</html>