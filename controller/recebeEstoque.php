<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    const PRODUTO = "SELECT * FROM produto";

    $produtos = $conexao -> consultaBanco(PRODUTO);
    $tamanhos = $conexao -> consultaTamanho();

    function opcoesP($produtos) {
        foreach ($produtos as $item) {
            echo "<option value=" . $item['codProduto'] . ">" . $item['nomeProduto'] . "</option>";
        }        
    }
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envEstoque'])) {
            $cadQuantidade = addslashes($_POST['txtQuantidade']);
            $codProduto = $_POST['slcProduto'];
            $codTamanho = addslashes($_POST['slcTamanho']);
    
            $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);
        }
    }    
?>