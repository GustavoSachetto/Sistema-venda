<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadTam = addslashes($_POST['txtTamanho']);
        $cadDate = date('Y-m-d');
        $cadTime = date('H:i:s');
        
        $resultadoCadastro = $conexao -> insereTamanho($cadTam);
        
        if ($resultadoCadastro) {
            alerta("Concluído!", "Tamanho cadastrado com sucesso.", "success");
            $conexao -> insereRegistro("Novo tamanho cadastrado.", $cadTime, $cadDate);
        } else {
            alerta("Erro!", "Tamanho já existente.", "error");
            $conexao -> insereRegistro("Tentativa do cadastro de tamanho.", $cadTime, $cadDate);
        }
    }
?>