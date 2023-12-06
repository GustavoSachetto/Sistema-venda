<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    $tamanhos = $conexao -> consultaTamanho();

    if (isset($tamanhos)) {
        echo "
        <table>
            <thead>    
                <tr>
                    <td>Tipo tamanho</td>
                    <td>Código tamanho</td>
                </tr>
            </thead>
            <tbody>
        ";
        foreach ($tamanhos as $item) {
            echo "
                <tr>
                    <td>" . stripslashes($item['tipoTamanho']) . "</td>
                    <td>" . stripslashes($item['codTam']) . "</td>
                </tr>
            ";
        }
        echo "
            </tbody>
            <tfoot>
                <tr>
                    <td colspan='13'><a href='cadastroTamanho.php'>Cadastrar mais tamanhos</a></td>
                </tr>
            </tfoot>
        </table>";
    } else {
        echo "<p>Nenhum tamanho cadastrado! <a href='cadastroTamanho.php'>Cadastrar</a></p>";
    }
?>