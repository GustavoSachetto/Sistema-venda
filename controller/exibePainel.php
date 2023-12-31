<?php 
    require_once 'model/conexao.php';
    $config = parse_ini_file('model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    $anoAtual = date('Y');
    $resultado = "";
    $consulta = "SELECT count(*) FROM venda";
    $verifica = $conexao -> consultaBanco($consulta);
    
    if ($verifica[0]['count(*)'] > 0) {
        $vendas = $conexao -> consultaBanco("SELECT venda.data FROM venda WHERE venda.data LIKE '$anoAtual%'");
        
        $resultado = $conexao -> consultaBanco('SELECT SUM(tamanhop.quantidade * produto.valorCusto) AS valorProduto FROM tamanhop INNER JOIN produto ON produto.codProduto = tamanhop.codProduto');
        $valorProduto = $conexao -> conversorMoeda($resultado[0]['valorProduto']);
        
        $resultado = $conexao -> consultaBanco('SELECT SUM(vendaitem.quantidadeVenda * vendaitem.valorUnitario) AS valorVenda FROM vendaitem');
        $valorVenda = $conexao -> conversorMoeda($resultado[0]['valorVenda']);
        
        $resultado = $conexao -> consultaBanco('SELECT count(*) FROM cliente');
        $nClientes = $resultado[0]['count(*)'];

        $resultado = $conexao -> consultaBanco('SELECT count(*) FROM tamanhop');
        $nEstoques = $resultado[0]['count(*)'];
        
        function grafico($vendas) {
            $resultado = array();
            foreach ($vendas as $item) {
                array_push($resultado, ("m".(explode('-', $item['data'], 3))[1]));
            }
            return $resultado;
        }

        $registros = $conexao -> consultaRegistro();

        function registro($registros) {
            $max = count($registros);
            if (count($registros) > 5) {
                $max = 5;
            }
            for ($i=0; $i < $max; $i++) { 
                echo 
                "<div class='notificacao'>
                    <p>
                        <i class='bx bx-bell'></i>
                        <span>" . $registros[$i]['texto'] . "</span>
                    </p>
                    <legend>" . $registros[$i]['data'] . "</legend>
                </div>";
            }
        }
    }
?>