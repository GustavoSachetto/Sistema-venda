<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const TAMANHOS = "SELECT * FROM tamanho";
    const CODPRODUTO = "SHOW TABLE STATUS LIKE 'produto'";

    $resultado = $conexao -> consultaBanco(CODPRODUTO);
    $codProduto = $resultado[0]['Auto_increment'];

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
        $cadQuantidade = addslashes($_POST['txtQuantidade']);
        $codTamanho = addslashes($_POST['slcTamanho']);

        $conexao -> insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca, $cadQuantidade, $codProduto, $codTamanho);
    }    
?>