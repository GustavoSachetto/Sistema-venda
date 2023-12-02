<?php
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM venda";
    $verifica = $conexao -> consultaBanco($consulta);
    
    if ($verifica[0]['count(*)'] !== 0) {

        echo "
        <form method='post' action=''>
            <h2>Exibe vendas</h2>
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
                            <button type='submit' name='editar' value=''>Ver</button>
                        </td>
                    </tr>
            ";
        }
        echo "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='13'>Cadastrar mais vendas</td>
                    </tr>
                </tfoot>
            </table>
        </form>";
    } else {
        echo "<p>Nenhum venda cadastrada!</p>";
    }
?>