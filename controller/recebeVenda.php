<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    $clientes = $conexao -> consultaBanco("SELECT * FROM cliente");
    $estoques = $conexao -> estoqueVenda();

    function opcoesC($clientes) {
        foreach ($clientes as $item) {
            echo "<option value=" . $item['codCliente'] . ">" . $item['codCliente'] . " - " . $item['nomeCliente'] . " - " . $item['cpf'] . "</option>";
        }        
    }
    
    function opcoesE($estoques) {
        foreach ($estoques as $item) {
            echo "<option value=" . $item['codProduto'] . ">" . $item['codProduto'] . " - " . $item['nomeProduto'] . " - " . $item['tipoTamanho'] . " - " . $item['genero'] . " - " . $item['marca'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadQuantidade = addslashes($_POST['txtQuantidade']);
        $codProduto =  addslashes($_POST['slcProduto']);
        $codTamanho = addslashes($_POST['slcTamanho']);

        $resultadoCadastro = $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);

        if ($resultadoCadastro === true) {
            alerta("Concluído!", "Venda cadastrada com sucesso.", "success");
        } else {
            alerta("Erro!", "Venda já cadastrada.", "error");
        }
    }    
?>