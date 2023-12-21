<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNomeP = addslashes($_POST['txtNomeP']);
        $cadValorC = addslashes($_POST['txtValorC']);
        $cadValorV = addslashes($_POST['txtValorV']);
        $cadCat = addslashes($_POST['txtCat']);
        $cadGen = addslashes($_POST['txtGen']);
        $cadTipo = addslashes($_POST['txtTipo']);
        $cadMarca = addslashes($_POST['txtMarca']);
        $cadDate = date('Y-m-d');
        $cadTime = date('H:i:s');

        $resultadoCadastro = $conexao -> insereProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca);
        
        if ($resultadoCadastro) {
            alerta("Concluído!", "Produto cadastrado com sucesso.", "success");
            $conexao -> insereRegistro("Novo produto cadastrado.", $cadTime, $cadDate);
        } else {
            alerta("Erro!", "Produto já existente.", "error");
            $conexao -> insereRegistro("Tentativa do cadastro de produto.", $cadTime, $cadDate);
        }
    }    
?>