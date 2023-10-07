<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNome = addslashes($_POST['txtNome']);
        $cadCpf = addslashes($_POST['txtCPF']);
        $cadCep = addslashes($_POST['txtCep']);
        $cadUF = addslashes($_POST['txtUF']);
        $cadNumero = addslashes($_POST['txtNumero']);
        $cadCidade = addslashes($_POST['txtCidade']);
        $cadBairro = addslashes($_POST['txtBairro']);
        $cadRua = addslashes($_POST['txtRua']);
        $cadLogradouro= addslashes($_POST['txtLogradouro']);
        $cadComplemento = addslashes($_POST['txtComplemento']);
        $cadObservacao = addslashes($_POST['txtObservacao']);

        $conexao -> insereCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadNumero, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadComplemento, $cadObservacao);
    }
?> 