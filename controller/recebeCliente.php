<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNome = addslashes($_POST['txtNome']);
        $cadCpf = addslashes($_POST['txtCPF']);
        $cadCep = addslashes($_POST['txtCep']);
        $cadUF = addslashes($_POST['txtUF']);
        $cadCidade = addslashes($_POST['txtCidade']);
        $cadBairro = addslashes($_POST['txtBairro']);
        $cadRua = addslashes($_POST['txtRua']);
        $cadLogradouro= addslashes($_POST['txtLogradouro']);
        $cadNumero = addslashes($_POST['txtNumero']);
        $cadComplemento = addslashes($_POST['txtComplemento']);
        $cadObservacao = addslashes($_POST['txtObservacao']);
        $cadDate = date('Y-m-d');
        $cadTime = date('H:i:s');

        $resultadoCadastro = $conexao -> insereCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadNumero, $cadComplemento, $cadObservacao);

        if ($resultadoCadastro === true) {
            alerta("Concluído!", "Cliente cadastrado com sucesso.", "success");
            $conexao -> insereRegistro("Novo cliente cadastrado.", $cadTime, $cadDate);
        } else {
            alerta("Erro!", "Cliente já existente (verifique o CPF).", "error");
            $conexao -> insereRegistro("Tentativa do cadastro de cliente.", $cadTime, $cadDate);
        }
    }
?> 