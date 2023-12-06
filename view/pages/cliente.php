<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | exibe cliente</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
        <script src="../js/formExcluir.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/buscaCliente.php');
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
                    <h3>Cliente / exibe</h3>
                    <form method="post" action="">
                        <h2>Busca clientes</h2>
                        <fieldset>
                            <input type="text" placeholder="Nome" name="txtNome" maxlength="80">
                            <input type="text" placeholder="CPF" name="txtCPF" maxlength="11">
                            <input type="text" placeholder="Cep" name="txtCep" minlength="8" maxlength="8" pattern="[0-9]{5}[0-9]{3}">
                            <input type="text" placeholder="UF" name="txtUF" minlength="2" maxlength="2" pattern="[aA-zZ]{2}">
                            <input type="text" placeholder="Cidade" name="txtCidade" maxlength="30">    
                            <input type="text" placeholder="Bairro" name="txtBairro" maxlength="30">
                            <input type="text" placeholder="Codigo cliente" name="txtCod">
                            <button type="submit" name="envBusca">
                                <i class='bx bx-search'></i>
                                <span>Buscar</span>
                            </button>
                        </fieldset>
                    </form>
                </section>
                <section id="table" class="container-table">
                    <h2>Exibe clientes</h2>
                    <?php include ('../../controller/exibeCliente.php') ?>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>