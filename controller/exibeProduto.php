<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    if (isset($produtos)) {
        echo "
        <form method='post' action='editarProduto.php'>
            <h2>Exibe produtos</h2>
            <table>
                <thead>
                    <td>#</td>
                    <td>Nome</td>
                    <td>Categoria</td>
                    <td>Genero</td>
                    <td>Marca</td>
                    <td>Tipo</td>
                    <td>Valor custo</td>
                    <td>Valor venda</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
        ";
        foreach ($produtos as $item) {

            echo "
                    <tr>
                        <td>" . stripslashes($item['codProduto']) . "</td>
                        <td>" . stripslashes($item['nomeProduto']) . "</td>
                        <td>" . stripslashes($item['categoria']) . "</td>
                        <td>" . stripslashes($item['genero']) . "</td>
                        <td>" . stripslashes($item['marca']) . "</td>
                        <td>" . stripslashes($item['tipo']) . "</td>
                        <td>" . $conexao -> conversorMoeda($item['valorCusto']) . "</td>
                        <td>" . $conexao -> conversorMoeda($item['valorVenda']) . "</td>
                        <td>
                            <div class='buttons'>
                                <button type='submit' class='editar' name='editar' value=" . $item['codProduto'] . ">Editar</button>
                                <button type='button' class='excluir produto' name='excluir' value=" . $item['codProduto'] . ">Excluir</button>
                            </div>
                        </td>
                    </tr>
            ";
        }
        echo "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='13'><a href='cadastroProduto.php'>Cadastrar mais produtos</a></td>
                    </tr>
                </tfoot>
            </table>
        </form>";
    } else {
        echo "<p>Nenhum produto cadastrado! <a href='cadastroProduto.php'>Cadastrar</a></p>";
    }
?>