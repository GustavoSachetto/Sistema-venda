<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM cliente";
    $verifica = $conexao -> consultaBanco($consulta);

    $buscaNome = $buscaCpf = $buscaCep = $buscaUF = $buscaCidade = $buscaBairro = $buscaCod = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $buscaNome = addslashes($_POST['txtNome']);
        $buscaCpf = addslashes($_POST['txtCPF']);
        $buscaCep = addslashes($_POST['txtCep']);
        $buscaUF = addslashes($_POST['txtUF']);
        $buscaCidade = addslashes($_POST['txtCidade']);
        $buscaBairro = addslashes($_POST['txtBairro']);
        $buscaCod = addslashes($_POST['txtCod']);
    } 

    $resultado = $conexao -> consultaCliente($buscaNome, $buscaCpf, $buscaCep, $buscaUF, $buscaCidade, $buscaBairro, $buscaCod);

    if ($verifica[0]['count(*)'] !== 0) {
        
        echo "
        <table>
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>Bairro</td>
                <td>Rua</td>
                <td>CEP</td>
                <td>Cidade</td>
                <td>Número Residencial</td>
                <td>UF</td>
                <td>Tipo Logradouro</td>
                <td>Complemento</td>
                <td>Observação</td>
                <td>Código do Cliente</td>
            </tr>
        ";
        foreach ($resultado as $valor) {
            echo "
                <tr>
                    <td>" . stripslashes($valor['nomeCliente']) . "</td>
                    <td>" . stripslashes($valor['cpf']) . "</td>
                    <td>" . stripslashes($valor['bairro']) . "</td>
                    <td>" . stripslashes($valor['rua']) . "</td>
                    <td>" . stripslashes($valor['CEP']) . "</td>
                    <td>" . stripslashes($valor['cidade']) . "</td>
                    <td>" . stripslashes($valor['nResidencial']). "</td>
                    <td>" . stripslashes($valor['UF']) . "</td>
                    <td>" . stripslashes($valor['tipoLogradouro']) . "</td>
                    <td>" . stripslashes($valor['complemento']) . "</td>
                    <td>" . stripslashes($valor['observacao']) . "</td>
                    <td>" . stripslashes($valor['codCliente']) . "</td>
                </tr>
            ";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum cliente cadastrado!</p>";
    }
?>