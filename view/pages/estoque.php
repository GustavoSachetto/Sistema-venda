<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | exibe estoque</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
    </head>
    <body>
        <?php require ('../layout/header.php');
            include ('../../controller/buscaEstoque.php');
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
                    <h3>Estoque / exibe</h3>
                    <form method="post" action="">
                        <h2>Buscar estoques</h2>
                        <fieldset>
                            <input type="text" placeholder="Nome" name="txtNome" maxlength="80">
                            <input type="text" placeholder="Categoria" name="txtCate" maxlength="30">
                            <input type="text" placeholder="Genero" name="txtGen" maxlength="10">
                            <input type="text" placeholder="Marca" name="txtMarca" maxlength="30">
                            <input type="text" placeholder="Tipo" name="txtTipo" maxlength="30">    
                            <input type="text" placeholder="Codigo" name="txtCod">
                            <select name="slcTamanho">
                                <option value="">Todos</option>
                                <?php opcoes($tamanhos)?>
                            </select>
                            <button type="submit" name="envBusca">
                                <i class='bx bx-search'></i>
                                <span>Buscar</span>
                            </button>
                        </fieldset>
                    </form>
                </section>
                <section id="table" class="container-table">
                    <h2>Exibe estoques</h2>
                    <?php include ('../../controller/exibeEstoque.php') ?>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>