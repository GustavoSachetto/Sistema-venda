<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $buscaNome = $buscaCate = $buscaGen = $buscaMarca = $buscaTipo = $buscaCod = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envBusca'])) {
            $buscaNome = addslashes($_POST['txtNome']);
            $buscaCate = addslashes($_POST['txtCate']);
            $buscaGen = addslashes($_POST['txtGen']);
            $buscaMarca = addslashes($_POST['txtMarca']);
            $buscaTipo = addslashes($_POST['txtTipo']);
            $buscaCod = addslashes($_POST['txtCod']);
        }
    } 

    $produtos = $conexao -> consultaProduto($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod);
?>