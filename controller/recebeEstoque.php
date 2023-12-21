<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');
    
    $produtos = $conexao -> consultaBanco("SELECT * FROM produto");
    $tamanhos = $conexao -> consultaTamanho();

    function opcoesP($produtos) {
        foreach ($produtos as $item) {
            echo "<option value=" . $item['codProduto'] . ">" . $item['codProduto'] . " - " . $item['nomeProduto'] . "</option>";
        }        
    }
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadQuantidade = addslashes($_POST['txtQuantidade']);
        $codProduto =  addslashes($_POST['slcProduto']);
        $codTamanho = addslashes($_POST['slcTamanho']);
        $cadDate = date('Y-m-d');
        $cadTime = date('H:i:s');

        $resultadoCadastro = $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);

        if ($resultadoCadastro) {
            alerta("Concluído!", "Estoque cadastrado com sucesso.", "success");
            $conexao -> insereRegistro("Novo estoque cadastrado.", $cadTime, $cadDate);
        } else {
            alerta("Erro!", "Estoque já existente.", "error");
            $conexao -> insereRegistro("Tentativa do cadastro de estoque.", $cadTime, $cadDate);
        }
    }    
?>