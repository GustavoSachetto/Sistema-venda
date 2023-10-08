<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro tamanho</title>
        <?php require ('../layout/head.php') ?>
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
        ?>
        <main>
            <article>
                <form action="" method="get">
                    <fieldset>
                        <input type="text" name="txtBusca">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </fieldset>
                </form>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>