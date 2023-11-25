<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadTam = addslashes($_POST['txtTamanho']);
        
        $resultadoCadastro = $conexao -> insereTamanho($cadTam);
        
        if ($resultadoCadastro === true) {
            alerta("Concluído!", "Tamanho cadastrado com sucesso.", "success");
        } else {
            alerta("Erro!", "Tamanho já existente.", "error");
        }
    }
?>