<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro cliente</title>
        <link rel="stylesheet" href="../css/form.css">
        <?php require ('../layout/head.php') ?>
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/recebeCliente.php');
        ?>
        <main>
            <article>
                <section>
                    <form method="post" action="">
                        <h2>Cadastro cliente</h2>
                        <fieldset id="cliente">
                            <p>Informações do cliente:</p><br>
                            <input type="text" placeholder="Nome" name="txtNome" minlength="5" maxlength="80" required>
                            <input type="text" placeholder="CPF" name="txtCPF" minlength="11" maxlength="11" required>
                        </fieldset>
                        <fieldset id="endereco">
                            <p>Informações do endereço:</p><br>
                            <input type="text" placeholder="Cep" name="txtCep" minlength="8" maxlength="8" pattern="[0-9]{5}[0-9]{3}" required>
                            <input type="text" placeholder="UF" name="txtUF" minlength="2" maxlength="2" pattern="[aA-zZ]{2}" required>
                            <input type="text" placeholder="Cidade" name="txtCidade" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Bairro" name="txtBairro" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Rua" name="txtRua" minlength="5" maxlength="30" required>
                            <input type="text" placeholder="Logradouro" name="txtLogradouro" minlength="2" maxlength="10" required>
                            <input type="text" placeholder="Numero" name="txtNumero" pattern="[0-9]+" required>
                            <input type="text" placeholder="Complemento" name="txtComplemento" minlength="0" maxlength="10">
                            <input type="text" placeholder="Observacao" name="txtObservacao" maxlength="30">
                        </fieldset>
                        <button type="submit">Enviar</button>
                    </form>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>