<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $consulta = "SELECT count(*) FROM tamanho";
    $verifica = $conexao -> consultaBanco($consulta);

    if ($verifica[0]['count(*)'] !== 0) {
        $resultado = $conexao -> consultaTamanho();

        echo "
        <h2>Exibe tamanhos</h2>
        <table>
            <thead>    
                <tr>
                    <td>Tipo tamanho</td>
                    <td>Código tamanho</td>
                </tr>
            </thead>
            <tbody>
        ";
        foreach ($resultado as $valor) {
            echo "
                <tr>
                    <td>" . stripslashes($valor['tipoTamanho']) . "</td>
                    <td>" . stripslashes($valor['codTam']) . "</td>
                </tr>
            ";
        }
        echo "
            </tbody>
            <tfoot>
                <tr>
                    <td colspan='13'>Cadastrar mais tamanhos</td>
                </tr>
            </tfoot>
        </table>";
    } else {
        echo "<p>Nenhum tamanho cadastrado!</p>";
    }
?>