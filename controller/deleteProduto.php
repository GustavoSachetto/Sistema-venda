<?php 
    include 'alerta.php';
    require_once '../model/conexao.php';
    $config = parse_ini_file('../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['excluir'])) {
            $codigo = addslashes($_POST['excluir']);
            $resultadoDeletar = $conexao -> deleteProduto($codigo);

            if ($resultadoDeletar === true) {
                return alerta("Concluído!", "Produto deletado com sucesso.", "success");
            } else {
                return alerta("Erro!", "Produto já inserido no estoque.", "error");
            }
        }
    }
?>