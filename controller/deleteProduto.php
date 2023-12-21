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
            $resultadoDeletar = $conexao -> deleteProduto($codigo);

            if ($resultadoDeletar) {
                return alerta("Concluído!", "Produto deletado com sucesso.", "success");
                $conexao -> insereRegistro("Produto deletado.", $cadTime, $cadDate);
            } else {
                return alerta("Erro!", "Produto já inserido no estoque.", "error");
                $conexao -> insereRegistro("Tentativa de deletar produto.", $cadTime, $cadDate);
            }
        }
    }
?>