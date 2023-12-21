<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');
    
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
            $cadDate = date('Y-m-d');
            $cadTime = date('H:i:s');
            
            $resultadoEditar = $conexao -> atualizaProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca, $codProduto);

            if ($resultadoEditar) {
                alerta("Concluído!", "Produto editado com sucesso.", "success");
                $conexao -> insereRegistro("Alteração de produto.", $cadTime, $cadDate);
            } else {
                alerta("Erro!", "Produto já inserido no estoque.", "error");
                $conexao -> insereRegistro("Tentativa da alteração de produto.", $cadTime, $cadDate);
            }
        }
        
        $produto = $conexao -> exibeProduto($codProduto);
    }
?>