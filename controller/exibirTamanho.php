<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    const TAMANHOS = "SELECT * FROM tamanho ORDER BY codTam ASC";
    
    $resultado = $conexao -> consultaBanco(TAMANHOS);

    function opçoes($resultado) {
        foreach ($resultado as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }
?>