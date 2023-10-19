<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM produto";
    $verifica = $conexao -> consultaBanco($consulta);
    
    if ($verifica[0]['count(*)'] !== 0) {
        $produtos = $conexao -> consultaProduto();
        $tamanhos = $conexao -> consultaTamanho();
        $tamanhosProduto = $conexao -> consultaTamanhoProduto();

        echo "
        <table>
            <tr>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Genero</td>
                <td>Marca</td>
                <td>Tipo</td>
                <td>Valor</td>
                <td>Tamanho</td>
                <td>Quantidade</td>
                <td>codProduto</td>
            </tr>
        ";
        foreach ($produtos as $produto) {
            
            foreach ($tamanhosProduto as $tamanhoProduto) {
                if ($produto['codProduto'] === $tamanhoProduto['codProduto']) {
                    $quantidade = $tamanhoProduto['quantidade'];
                    $codTam = $tamanhoProduto['codTam'];

                    foreach ($tamanhos as $tamanho) {
                        if ($tamanho['codTam'] === $codTam) {
                            $produtoTamanho = $tamanho['tipoTamanho'];
                        }
                    }
                }
            }

            echo "
                <tr>
                    <td>" . stripslashes($produto['nomeProduto']) . "</td>
                    <td>" . stripslashes($produto['categoria']) . "</td>
                    <td>" . stripslashes($produto['genero']) . "</td>
                    <td>" . stripslashes($produto['marca']) . "</td>
                    <td>" . stripslashes($produto['tipo']) . "</td>
                    <td>" . stripslashes($produto['valor']) . "</td>
                    <td>" . stripslashes($produtoTamanho) . "</td>
                    <td>" . stripslashes($quantidade) . "</td>
                    <td>" . stripslashes($produto['codProduto']) . "</td>
                </tr>
            ";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum produto cadastrado!</p>";
    }
?>