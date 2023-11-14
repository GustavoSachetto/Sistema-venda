<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM produto";
    $verifica = $conexao -> consultaBanco($consulta);
    
    if ($verifica[0]['count(*)'] !== 0) {

        echo "<form method='post' action=''>
        <table>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Genero</td>
                <td>Marca</td>
                <td>Tipo</td>
                <td>Tamanho</td>
                <td>Quantidade</td>
                <td>Valor UN</td>
                <td>Ações</td>
            </tr>
        ";
        foreach ($produtos as $produto) {

            echo "
                <tr>
                    <td>" . stripslashes($produto['codProduto']) . "</td>
                    <td>" . stripslashes($produto['nomeProduto']) . "</td>
                    <td>" . stripslashes($produto['categoria']) . "</td>
                    <td>" . stripslashes($produto['genero']) . "</td>
                    <td>" . stripslashes($produto['marca']) . "</td>
                    <td>" . stripslashes($produto['tipo']) . "</td>
                    <td>" . stripslashes($produto['tipoTamanho']) . "</td>
                    <td>" . stripslashes($produto['quantidade']) . "</td>
                    <td>" . "R$ " . number_format($produto['valor'], 2, ",", ".") . "</td>
                    <td>
                        <button type='submit' name='editar' value=" . $produto['codProduto'] . ">Editar</button>
                    </td>
                </tr>
            ";
        }
        echo "</table></form>";
    } else {
        echo "<p>Nenhum produto cadastrado!</p>";
    }
?>