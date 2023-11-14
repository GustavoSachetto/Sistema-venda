<?php 
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $tamanhos = $conexao -> consultaTamanho();
    
    function opcoes($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    $buscaNome = $buscaCate = $buscaGen = $buscaMarca = $buscaTipo = $buscaCod = $buscaCodTam = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['envBusca'])) {
            $buscaNome = addslashes($_POST['txtNome']);
            $buscaCate = addslashes($_POST['txtCate']);
            $buscaGen = addslashes($_POST['txtGen']);
            $buscaMarca = addslashes($_POST['txtMarca']);
            $buscaTipo = addslashes($_POST['txtTipo']);
            $buscaCod = addslashes($_POST['txtCod']);
            $buscaCodTam = addslashes($_POST['slcTamanho']);
        }
    } 

    $produtos = $conexao -> consultaProduto($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod, $buscaCodTam);
?>