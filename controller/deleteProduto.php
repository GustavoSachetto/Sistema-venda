<?php 
    include 'alerta.php';
    require_once '../model/conexao.php';
    $config = parse_ini_file('../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['excluir'])) {
            $codigo = addslashes($_POST['excluir']);
            $cadDate = date('Y-m-d');
            $cadTime = date('H:i:s');
            $resultadoDeletar = $conexao -> deleteProduto($codigo, $cadDate, $cadTime);

            if ($resultadoDeletar) {
                echo '{ "title": "Concluído!", "text": "Produto deletado com sucesso.", "icon": "success"}';
            } else {
                echo '{ "title": "Erro!", "text": "Produto já inserido no estoque.", "icon": "error"}';
            }
        }
    }
?>