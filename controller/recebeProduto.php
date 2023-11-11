<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const TAMANHOS = "SELECT * FROM tamanho";
    const CODPRODUTO = "SHOW TABLE STATUS LIKE 'produto'";

    $resultado = $conexao -> consultaBanco(CODPRODUTO);
    $codProduto = $resultado[0]['Auto_increment'];
    $tamanhos = $conexao -> consultaBanco(TAMANHOS);
    
    function opcoes($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envProduto'])) {
            $cadNomeP = addslashes($_POST['txtNomeP']);
            $cadValor = addslashes($_POST['txtValor']);
            $cadCat = addslashes($_POST['txtCat']);
            $cadGen = addslashes($_POST['txtGen']);
            $cadTipo = addslashes($_POST['txtTipo']);
            $cadMarca = addslashes($_POST['txtMarca']);
    
            $conexao -> insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca);
        }

        if (isset($_POST['envTamanho'])) {
            $cadQuantidade = addslashes($_POST['txtQuantidade']);
            $codProduto = $_GET['codProduto'];
            $codTamanho = addslashes($_POST['slcTamanho']);
    
            $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);
        }
    }    
?>