<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const TAMANHOS = "SELECT * FROM tamanho";
    
    $resultado = $conexao -> consultaBanco(TAMANHOS);
    
    function opcoes($resultado) {
        foreach ($resultado as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNomeP = addslashes($_POST['txtNomeP']);
        $cadValor = addslashes($_POST['txtValor']);
        $cadCat = addslashes($_POST['txtCat']);
        $cadGen = addslashes($_POST['txtGen']);
        $cadTipo = addslashes($_POST['txtTipo']);
        $cadMarca = addslashes($_POST['txtMarca']);
        $cadTamanho = addslashes($_POST['slcTamanho']);
        $cadQuantidade = addslashes($_POST['txtQuantidade']);

        $conexao -> insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca, $cadTamanho, $cadQuantidade);
    }    
?>