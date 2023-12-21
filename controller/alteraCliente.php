<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['editar'])) {
            $codCliente = $_SESSION['codCliente'] = $_POST['editar'];
        }
        
        if (isset($_POST['atualizar'])) {
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
            $codCliente = $_SESSION['codCliente'];
            $cadDate = date('Y-m-d');
            $cadTime = date('H:i:s');
    
            $resultadoEditar = $conexao -> atualizaCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadNumero, $cadComplemento, $cadObservacao, $codCliente);
    
            if ($resultadoEditar) {
                alerta("Concluído!", "Cliente editado com sucesso.", "success");
                $conexao -> insereRegistro("Alteração de cliente.", $cadTime, $cadDate);
            } else {
                alerta("Erro!", "Cliente já finalizou uma venda.", "error");
                $conexao -> insereRegistro("Tentativa da alteração de cliente.", $cadTime, $cadDate);
            }
        }
        
        $cliente = $conexao -> exibeCliente($codCliente);
    }
?>