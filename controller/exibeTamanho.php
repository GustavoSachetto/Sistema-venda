<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM tamanho";
    $verifica = $conexao -> consultaBanco($consulta);

    if ($verifica[0]['count(*)'] !== 0) {
        $resultado = $conexao -> consultaTamanho();

        echo "
        <table>
            <tr>
                <td>Tipo tamanho</td>
                <td>Código tamanho</td>
            </tr>
        ";
        foreach ($resultado as $valor) {
            echo "
                <tr>
                    <td>" . stripslashes($valor['tipoTamanho']) . "</td>
                    <td>" . stripslashes($valor['codTam']) . "</td>
                </tr>
            ";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum tamanho cadastrado!</p>";
    }
?>