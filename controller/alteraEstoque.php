<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    $tamanhos = $conexao -> consultaTamanho();
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['editar'])) {
            $codEstoque = $_SESSION['codEstoque'] = $_POST['editar'];
        }
        
        if (isset($_POST['atualizar'])) {
            $cadTam= addslashes($_POST['slcTamanho']);
            $cadQuantidade= addslashes($_POST['txtQuantidade']);
            $codEstoque = $_SESSION['codEstoque'];
            
            $resultadoEditar = $conexao -> atualizaEstoque($cadQuantidade, $cadTam, $codEstoque);

            if ($resultadoEditar === true) {
                alerta("Concluído!", "Estoque editado com sucesso.", "success");
            } else {
                alerta("Erro!", "Estoque já incluido em uma venda.", "error");
            }
        }
        
        $estoque = $conexao -> exibeEstoque($codEstoque);
    }
?>