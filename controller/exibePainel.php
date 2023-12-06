<?php 
        require_once 'model/conexao.php';
        $config = parse_ini_file('model/config.ini');
        $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

        $resultado;
        
        const VALORPRODUTO = 'SELECT SUM(tamanhop.quantidade * produto.valorCusto) AS valorProduto FROM tamanhop INNER JOIN produto ON produto.codProduto = tamanhop.codProduto';
        const VALORVENDA = 'SELECT SUM(vendaItem.quantidadeVenda * vendaItem.valorUnitario) AS valorVenda FROM vendaItem';
        const NCLIENTES = 'SELECT count(*) FROM cliente';
        const NESTOQUES = 'SELECT count(*) FROM tamanhop';
        const VENDAS = 'SELECT venda.data FROM venda';
        
        $consulta = "SELECT count(*) FROM venda";
        $verifica = $conexao -> consultaBanco($consulta);
        
        if ($verifica[0]['count(*)'] > 0) {
            $vendas = $conexao -> consultaBanco(VENDAS);

            $resultado = $conexao -> consultaBanco(VALORPRODUTO);
            $valorProduto = $conexao -> conversorMoeda($resultado[0]['valorProduto']);
            
            $resultado = $conexao -> consultaBanco(VALORVENDA);
            $valorVenda = $conexao -> conversorMoeda($resultado[0]['valorVenda']);

            $resultado = $conexao -> consultaBanco(NCLIENTES);
            $nClientes = $resultado[0]['count(*)'];

            $resultado = $conexao -> consultaBanco(NESTOQUES);
            $nEstoques = $resultado[0]['count(*)'];

            function grafico($vendas) {
                $resultado = array();
                foreach ($vendas as $item) {
                    array_push($resultado, ("m".(explode('-', $item['data'], 3))[1]));
                }
                return $resultado;
            }
        }
?>