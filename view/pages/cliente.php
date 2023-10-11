<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exibir clientes</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/table.css">
    </head>
    <body>
        <?php 
            require ('../layout/header.php'); 
            include ('../../controller/exibeCliente.php');
            require ('../layout/footer.php'); 
            ?>
    </body>
</html>