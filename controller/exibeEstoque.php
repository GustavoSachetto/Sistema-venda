<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM tamanhop";
    $verifica = $conexao -> consultaBanco($consulta);
    
    if ($verifica[0]['count(*)'] !== 0) {

        echo "
        <form method='post' action='editarEstoque.php'>
            <h2>Exibe estoques</h2>
            <table>
                <thead>
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
                </thead>
                <tbody>
        ";
        foreach ($estoques as $item) {

            echo "
                    <tr>
                        <td>" . stripslashes($item['codEstoque']) . "</td>
                        <td>" . stripslashes($item['nomeProduto']) . "</td>
                        <td>" . stripslashes($item['categoria']) . "</td>
                        <td>" . stripslashes($item['genero']) . "</td>
                        <td>" . stripslashes($item['marca']) . "</td>
                        <td>" . stripslashes($item['tipo']) . "</td>
                        <td>" . stripslashes($item['tipoTamanho']) . "</td>
                        <td>" . stripslashes($item['quantidade']) . "</td>
                        <td>" . $conexao -> conversorMoeda($item['valor']) . "</td>
                        <td>    
                            <div class='buttons'>
                                <button type='submit' class='editar' name='editar' value=" . $item['codEstoque'] . ">Editar</button>
                            </div>
                        </td>
                    </tr>
                ";
        }
        echo "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='13'><a href='cadastroEstoque.php'>Cadastrar mais estoques</a></td>
                    </tr>
                </tfoot>
            </table>
        </form>";
    } else {
        echo "<p>Nenhum estoque cadastrado!</p>";
    }
?>