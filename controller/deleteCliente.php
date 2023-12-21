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
            $resultadoDeletar = $conexao -> deleteCliente($codigo);
            
            if ($resultadoDeletar) {
                return alerta("Concluído!", "Cliente deletado com sucesso.", "success");
                $conexao -> insereRegistro("Cliente deletado.", $cadTime, $cadDate);
            } else {
                return alerta("Erro!", "Cliente já finalizou uma venda.", "error");
                $conexao -> insereRegistro("Tentativa de deletar cliente.", $cadTime, $cadDate);
            }
        }
    }
?>