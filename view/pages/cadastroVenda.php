<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | cadastro venda</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/venda.css">
        <script src="../js/formVenda.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/recebeVenda.php');
        ?>
        <script>
            var clientes = <?= json_encode($clientes) ?>;
            var estoques = <?= json_encode($estoques) ?>;
        </script>
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
                <section id="form">
                    <h3>Venda / cadastro</h3>
                    <form method="post" action="">
                        <h2>Cadastro venda</h2>
                        <fieldset id="cliente">
                            <p>Informações do cliente:</p><br>
                            <select id="slcCliente" name="slcCliente" required>
                                <option value="">Selecione pelo nome</option>
                                <?php opcoesC($clientes)?>
                            </select>
                        </fieldset>
                        <fieldset class="showCliente">
                            <p><mark>Nome cliente:</mark> <span id="nomeC"></span></p>
                            <p><mark>Codigo cliente:</mark> <span id="codC"></span></p>
                            <p><mark>Cpf:</mark> <span id="cpfC"></span></p>
                            <p><mark>CEP:</mark> <span id="cepC"></span></p>
                            <p><mark>Estado:</mark> <span id="estadoC"></span></p>
                            <p><mark>Cidade:</mark> <span id="cidadeC"></span></p>
                            <p><mark>Bairro:</mark> <span id="bairroC"></span></p>
                            <p><mark>Logradouro:</mark> <span id="logC"></span></p>
                            <p><mark>Rua:</mark> <span id="ruaC"></span></p>
                            <p><mark>Numero:</mark> <span id="numeroC"></span></p>
                            <p><mark>Complemento:</mark> <span id="compleC"></span></p>
                            <p><mark>Observação:</mark> <span id="obserC"></span></p>
                        </fieldset>
                        <fieldset id="estoque">
                            <p>Informações dos produtos:</p><br>
                            <div id="produto">
                                <p>Produto: 1</p><br>
                                <select id="slcEstoque1" class="slcEstoque" name="estoque[]" required>
                                    <option value="">Selecione um produto</option>
                                    <?php opcoesE($estoques)?>
                                </select>
                                <input type="number" placeholder="Quantidade" class="txtQuantidade" name="quant[]" required>
                            </div>
                        </fieldset><hr>
                        <div class="container-button space">
                            <div>
                                <button type="button" id="remove" class="remove">
                                    <span>Remover produto</span>
                                </button>
                                <button type="button" id="add" class="add">
                                    <span>Adicionar produto</span>
                                </button>
                            </div>
                            <div>
                                <button type="reset">
                                    <i class='bx bx-trash'></i>
                                    <span>Limpar</span>
                                </button>
                                <button type="submit">
                                    <i class='bx bx-message-square-add'></i>
                                    <span>Cadastrar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>