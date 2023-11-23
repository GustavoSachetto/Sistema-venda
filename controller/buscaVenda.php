<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $buscaCodV = $buscaCpf = $buscaCodC = $buscaData = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envBusca'])) {
            $buscaCodV = addslashes($_POST['txtCodV']);
            $buscaCpf = addslashes($_POST['txtCpf']);
            $buscaCodC = addslashes($_POST['txtCodC']);
            $buscaData = addslashes($_POST['txtDate']);
        }
    } 

    $vendas = $conexao -> consultaVenda($buscaCodV, $buscaCpf, $buscaCodC, $buscaData);
?>