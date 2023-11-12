<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM cliente";
    $verifica = $conexao -> consultaBanco($consulta);

    $buscaNome = $buscaCpf = $buscaCep = $buscaUF = $buscaCidade = $buscaBairro = $buscaCod = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envBusca'])) {
            $buscaNome = addslashes($_POST['txtNome']);
            $buscaCpf = addslashes($_POST['txtCPF']);
            $buscaCep = addslashes($_POST['txtCep']);
            $buscaUF = addslashes($_POST['txtUF']);
            $buscaCidade = addslashes($_POST['txtCidade']);
            $buscaBairro = addslashes($_POST['txtBairro']);
            $buscaCod = addslashes($_POST['txtCod']);
        }
    } 

    $clientes = $conexao -> consultaCliente($buscaNome, $buscaCpf, $buscaCep, $buscaUF, $buscaCidade, $buscaBairro, $buscaCod);

    if ($verifica[0]['count(*)'] !== 0) {
        
        echo "<form method='post' action=''>
        <table>
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
                <td>Tipo Logradouro</td>
                <td>Complemento</td>
                <td>Observação</td>
            </tr>
        ";
        foreach ($clientes as $cliente) {
            echo "
                <tr>
                    <td>" . stripslashes($cliente['codCliente']) . "</td>
                    <td>" . stripslashes($cliente['nomeCliente']) . "</td>
                    <td>" . stripslashes($cliente['cpf']) . "</td>
                    <td>" . stripslashes($cliente['CEP']) . "</td>
                    <td>" . stripslashes($cliente['rua']) . "</td>
                    <td>" . stripslashes($cliente['nResidencial']). "</td>
                    <td>" . stripslashes($cliente['bairro']) . "</td>
                    <td>" . stripslashes($cliente['cidade']) . "</td>
                    <td>" . stripslashes($cliente['UF']) . "</td>
                    <td>" . stripslashes($cliente['tipoLogradouro']) . "</td>
                    <td>" . stripslashes($cliente['complemento']) . "</td>
                    <td>" . stripslashes($cliente['observacao']) . "</td>
                    <td>
                    <button type='submit' name='excluir' value=" . $cliente['codCliente'] . ">Excluir</button>
                </td>
                </tr>
            ";
        }
        echo "</table></form>";
    } else {
        echo "<p>Nenhum cliente cadastrado!</p>";
    }
?>