<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM cliente";
    $verifica = $conexao -> consultaBanco($consulta);

    if ($verifica[0]['count(*)'] !== 0) {
        
        echo "
        <form method='post' action='editarCliente.php'>
            <h2>Exibe clientes</h2>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>CEP</td>
                        <td>Rua</td>
                        <td>Número</td>
                        <td>Bairro</td>
                        <td>Cidade</td>
                        <td>UF</td>
                        <td>Log</td>
                        <td>Comple</td>
                        <td>Observação</td>
                        <td>Ações</td>
                    </tr>
                </thead>  
                <tbody>
        ";
        foreach ($clientes as $item) {
            echo "
                    <tr>
                        <td>" . stripslashes($item['codCliente']) . "</td>
                        <td>" . stripslashes($item['nomeCliente']) . "</td>
                        <td>" . stripslashes($item['cpf']) . "</td>
                        <td>" . stripslashes($item['CEP']) . "</td>
                        <td>" . stripslashes($item['rua']) . "</td>
                        <td>" . stripslashes($item['nResidencial']). "</td>
                        <td>" . stripslashes($item['bairro']) . "</td>
                        <td>" . stripslashes($item['cidade']) . "</td>
                        <td>" . stripslashes($item['UF']) . "</td>
                        <td>" . stripslashes($item['tipoLogradouro']) . "</td>
                        <td>" . stripslashes($item['complemento']) . "</td>
                        <td>" . stripslashes($item['observacao']) . "</td>
                        <td>
                            <div class='buttons'>
                                <button type='submit' class='editar' name='editar' value=" . $item['codCliente'] . ">Editar</button>
                                <button type='button' class='excluir cliente' name='excluir' value=" . $item['codCliente'] . ">Excluir</button>
                            </div>
                        </td>
                    </tr> 
                ";
        }
        echo "
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='13'>Cadastrar mais clientes</td>
                    </tr>
                </tfoot>
            </table>
        </form>";
    } else {
        echo "<p>Nenhum cliente cadastrado!</p>";
    }
?>