<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | editar cliente</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/form.css">
        <script src="../js/form.js"></script>
    </head>
    <body>
        <?php 
            require ('../layout/header.php');
            include ('../../controller/alteraCliente.php');
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
                <section id="form">
                    <h3>Cliente / editar</h3>
                    <form method="post" action="">
                        <h2>Editar cliente</h2>
                        <fieldset id="cliente">
                            <p>Informações do cliente:</p><br>
                            <input type="text" placeholder="Nome" value="<?= $cliente[0]['nomeCliente']?>" name="txtNome" minlength="5" maxlength="80" required>
                            <input type="text" placeholder="CPF" value="<?= $cliente[0]['cpf']?>" name="txtCPF" minlength="11" maxlength="11" required>
                        </fieldset>
                        <fieldset id="endereco">
                            <p>Informações do endereço:</p><br>
                            <input type="text" placeholder="Cep" value="<?= $cliente[0]['CEP']?>" name="txtCep" id="txtCep" minlength="8" maxlength="8" pattern="[0-9]{5}[0-9]{3}" required>
                            <input type="text" placeholder="Numero" value="<?= $cliente[0]['nResidencial']?>" name="txtNumero" pattern="[0-9]+" required>
                            <input type="text" placeholder="UF" value="<?= $cliente[0]['UF']?>" name="txtUF" id="txtUF" minlength="2" maxlength="2" pattern="[aA-zZ]{2}" required>
                            <input type="text" placeholder="Cidade" value="<?= $cliente[0]['cidade']?>" name="txtCidade" id="txtCidade" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Bairro" value="<?= $cliente[0]['bairro']?>" name="txtBairro" id="txtBairro" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Rua" value="<?= $cliente[0]['rua']?>" name="txtRua" id="txtRua" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Logradouro" value="<?= $cliente[0]['tipoLogradouro']?>" name="txtLogradouro" minlength="2" maxlength="10" required>
                            <input type="text" placeholder="Complemento" value="<?= $cliente[0]['complemento']?>" name="txtComplemento" minlength="0" maxlength="10">
                            <input type="text" placeholder="Observacao" value="<?= $cliente[0]['observacao']?>" name="txtObservacao" maxlength="30">
                        </fieldset><hr>
                        <div class="container-button">
                            <button type="reset">
                                <i class='bx bx-trash'></i>
                                <span>Limpar</span>
                            </button>
                            <button type="submit" name="atualizar">
                                <i class='bx bx-message-square-add'></i>
                                <span>Atualizar</span>
                            </button>
                        </div>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php'); ?>
    </body>
</html>