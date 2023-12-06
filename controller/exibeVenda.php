<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if (isset($vendas) && empty(!$vendas[0]['codVenda'])) {
        echo "
        <form method='post' action=''>
            <table>
                <thead>
                    <td>#</td>
                    <td>Cpf cliente</td>
                    <td>Código cliente</td>
                    <td>Data</td>
                    <td>Hora</td>
                    <td>Valor total</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
        ";
        foreach ($vendas as $item) {

            echo "
                    <tr>
                        <td>" . stripslashes($item['codVenda']) . "</td>
                        <td>" . stripslashes($item['cpf']) . "</td>
                        <td>" . stripslashes($item['codCliente']) . "</td>
                        <td>" . stripslashes($item['data']) . "</td>
                        <td>" . stripslashes($item['hora']) . "</td>
                        <td>" .  $conexao -> conversorMoeda($item['total'])  . "</td>
                        <td>
                            <button type='submit' class='detalhes' name='detalhes' value='". stripslashes($item['codVenda']) ."'>Detalhes</button>
                        </td>
                    </tr>
            ";
        }
        echo "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='13'><a href='cadastroVenda.php'>Cadastrar mais vendas</a></td>
                    </tr>
                </tfoot>
            </table>
        </form>";
    } else {
        echo "<p>Nenhum venda encontrada! <a href='cadastroVenda.php'>Cadastrar</a></p>";
    }
?>