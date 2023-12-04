<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');
    
    $clientes = $conexao -> consultaBanco("SELECT * FROM cliente");
    $estoques = $conexao -> estoqueVenda();
    $cadEstoque = array();
    $cadQuant = array();

    function opcoesC($clientes) {
        foreach ($clientes as $item) {
            echo "<option value=" . $item['codCliente'] . ">" . $item['codCliente'] . " - " . $item['nomeCliente'] . " - " . $item['cpf'] . "</option>";
        }        
    }
    
    function opcoesE($estoques) {
        foreach ($estoques as $item) {
            echo "<option value=" . $item['codEstoque'] . "-" . $item['valor'] . ">" . $item['codProduto'] . " - " . $item['nomeProduto'] . " - " . $item['tipoTamanho'] . " - " . $item['genero'] . " - " . $item['marca'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codCliente = $_POST['slcCliente'];
        $cadEstoque = $_POST['cadEstoque'];
        $cadQuant =  $_POST['cadQuant'];
        $cadDate = date('Y-m-d');
        $cadTime = date('H:i:s');
        
        $codVenda = $conexao -> insereVenda($codCliente, $cadDate, $cadTime);
        
        for ($i=0; $i < count($cadEstoque); $i++) { 
            $codEstoque[$i] = explode("-", $cadEstoque[$i])[0];
            $cadValor[$i] = explode("-", $cadEstoque[$i])[1];
            
            $resultadoCadastro = $conexao -> insereVendaItem($codEstoque[$i], $codVenda, $cadQuant[$i], $cadValor[$i]);
        }

        if ($resultadoCadastro === true) {
            alerta("Concluído!", "Venda cadastrada com sucesso.", "success");
        } else {
            alerta("Erro!", "Venda já cadastrada.", "error");
        }
    }    
?>