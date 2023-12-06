<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNomeP = addslashes($_POST['txtNomeP']);
        $cadValorC = addslashes($_POST['txtValorC']);
        $cadValorV = addslashes($_POST['txtValorV']);
        $cadCat = addslashes($_POST['txtCat']);
        $cadGen = addslashes($_POST['txtGen']);
        $cadTipo = addslashes($_POST['txtTipo']);
        $cadMarca = addslashes($_POST['txtMarca']);

        $resultadoCadastro = $conexao -> insereProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca);
        
        if ($resultadoCadastro === true) {
            alerta("Concluído!", "Produto cadastrado com sucesso.", "success");
        } else {
            alerta("Erro!", "Produto já existente.", "error");
        }
    }    
?>