<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $buscaNome = $buscaCpf = $buscaCep = $buscaUF = $buscaCidade = $buscaBairro = $buscaCod = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envBusca'])) {
            $buscaNome = addslashes($_POST['txtNome']);
            $buscaCpf = addslashes($_POST['txtCPF']);
            $buscaCep = addslashes($_POST['txtCep']);
            $buscaUF = addslashes($_POST['txtUF']);
            $buscaCidade = addslashes($_POST['txtCidade']);
            $buscaBairro = addslashes($_POST['txtBairro']);
            $buscaCod = addslashes($_POST['txtCod']);
        }
    } 

    $clientes = $conexao -> consultaCliente($buscaNome, $buscaCpf, $buscaCep, $buscaUF, $buscaCidade, $buscaBairro, $buscaCod);
?>