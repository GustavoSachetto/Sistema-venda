<?php 
        require_once 'model/conexao.php';
        $config = parse_ini_file('model/config.ini');
        $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

        $resultado;
        
        const VALORPRODUTO = 'SELECT SUM(tamanhop.quantidade * produto.valor) AS valorProduto FROM tamanhop INNER JOIN produto ON produto.codProduto = tamanhop.codProduto';
        const VALORVENDA = 'SELECT SUM(vendaItem.quantidadeVenda * vendaItem.valorUnitario) AS valorVenda FROM vendaItem';
        const NCLIENTES = 'SELECT count(*) FROM cliente';
        const NPRODUTOS = 'SELECT count(*) FROM tamanhop';
    
        $consulta = "SELECT count(*) FROM venda";
        $verifica = $conexao -> consultaBanco($consulta);
        
        if ($verifica[0]['count(*)'] !== 0) {
            $resultado = $conexao -> consultaBanco(VALORPRODUTO);
            $valorProduto = "R$ " . number_format($resultado[0]['valorProduto'], 2, ",", ".");
            
            $resultado = $conexao -> consultaBanco(VALORVENDA);
            $valorVenda = "R$ " . number_format($resultado[0]['valorVenda'], 2, ",", ".");

            $resultado = $conexao -> consultaBanco(NCLIENTES);
            $nClientes = $resultado[0]['count(*)'];

            $resultado = $conexao -> consultaBanco(NPRODUTOS);
            $nProdutos = $resultado[0]['count(*)'];
        }
?>