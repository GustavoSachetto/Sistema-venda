<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | cadastro estoque</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
        <script src="../js/selecionaProduto.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/recebeEstoque.php');
        ?>
        <script>
            var produtos = <?= json_encode($produtos) ?>
        </script>
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
                </section>
                <section>
                    <h3>Estoque / cadastro</h3>
                    <form method="post" action="">
                        <h2>Cadastro estoque</h2>
                        <fieldset id="produto">
                            <p>Informações do produto:</p><br>
                                <select id="slcProduto" name="slcProduto">
                                    <option value="">Selecione pelo nome</option>
                                    <?php opcoesP($produtos)?>
                                </select>
                            </fieldset>
                            <fieldset>
                                <p><mark>Nome produto:</mark> <span id="nomeP"></span></p>
                                <p><mark>Codigo produto:</mark> <span id="codP"></span></p>
                                <p><mark>Categoria:</mark> <span id="cateP"></span></p>
                                <p><mark>Genero:</mark> <span id="geneP"></span></p>
                                <p><mark>Marca:</mark> <span id="marcaP"></span></p>
                                <p><mark>Tipo:</mark> <span id="tipoP"></span></p>
                                <p><mark>Valor unitário:</mark> <span id="valorP"></span></p>
                            </fieldset>
                        <fieldset id="tamanho">
                            <p>Informações do tamanho produto:</p><br>
                            <select name="slcTamanho">
                                <?php opcoesT($tamanhos)?>
                            </select>
                            <input type="number" placeholder="Quantidade" name="txtQuantidade" required>
                        </fieldset>
                        <hr>
                        <div class="container-button">
                            <button type="reset"><i class='bx bx-trash'></i> <span>Limpar</span></button>
                            <button type="submit" id="envEstoque" name="envEstoque"><i class='bx bx-message-square-add'></i> <span>Cadastrar</span></button>
                        </div>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>