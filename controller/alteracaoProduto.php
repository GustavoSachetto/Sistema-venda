<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['excluir'])) {
            $codProduto = addslashes($_POST['excluir']);    
            $conexao -> deleteProduto($codProduto);
        }
    }
?>