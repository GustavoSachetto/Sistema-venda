<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['editar'])) {
            $codProduto = $_SESSION['codProduto'] = $_POST['editar'];
        }
        
        if (isset($_POST['atualizar'])) {
            $cadNomeP = addslashes($_POST['txtNomeP']);
            $cadValorC = addslashes($_POST['txtValorC']);
            $cadValorV = addslashes($_POST['txtValorV']);
            $cadCat = addslashes($_POST['txtCat']);
            $cadGen = addslashes($_POST['txtGen']);
            $cadTipo = addslashes($_POST['txtTipo']);
            $cadMarca = addslashes($_POST['txtMarca']);
            $codProduto = $_SESSION['codProduto'];
            
            $resultadoEditar = $conexao -> atualizaProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca, $codProduto);

            if ($resultadoEditar === true) {
                alerta("Concluído!", "Produto editado com sucesso.", "success");
            } else {
                alerta("Erro!", "Produto já inserido no estoque.", "error");
            }
        }
        
        $produto = $conexao -> exibeProduto($codProduto);
    }
?>