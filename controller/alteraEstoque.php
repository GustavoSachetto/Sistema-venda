<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $tamanhos = $conexao -> consultaTamanho();
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['editar'])) {
            $codEstoque = $_SESSION['codEstoque'] = $_POST['editar'];
        }
        
        if (isset($_POST['atualizar'])) {
            $cadNomeP = addslashes($_POST['txtNomeP']);
            $cadValor = addslashes($_POST['txtValor']);
            $cadCat = addslashes($_POST['txtCat']);
            $cadGen = addslashes($_POST['txtGen']);
            $cadTipo = addslashes($_POST['txtTipo']);
            $cadMarca = addslashes($_POST['txtMarca']);
            $codEstoque = $_SESSION['codEstoque'];
            
            $resultadoEditar = $conexao -> atualizaProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca, $codEstoque);

            if ($resultadoEditar === true) {
                alerta("Concluído!", "Produto editado com sucesso.", "success");
            } else {
                alerta("Erro!", "Produto já inserido no estoque.", "error");
            }
        }
        
        $estoque = $conexao -> exibeEstoque($codEstoque);
    }
?>