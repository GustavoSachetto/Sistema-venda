<?php 
    include 'alerta.php';
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    date_default_timezone_set('America/Sao_Paulo');

    $tamanhos = $conexao -> consultaTamanho();
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['editar'])) {
            $codEstoque = $_SESSION['codEstoque'] = explode("-", $_POST['editar'])[0];
            $codProduto = $_SESSION['codProduto'] = explode("-", $_POST['editar'])[1];
        }
        
        if (isset($_POST['atualizar'])) {
            $cadTam= addslashes($_POST['slcTamanho']);
            $cadQuantidade= addslashes($_POST['txtQuantidade']);
            $codEstoque = $_SESSION['codEstoque'];
            $codProduto = $_SESSION['codProduto'];
            $cadDate = date('Y-m-d');
            $cadTime = date('H:i:s');
            
            $resultadoEditar = $conexao -> atualizaEstoque($cadQuantidade, $cadTam, $codEstoque, $codProduto);

            if ($resultadoEditar === 2) {
                alerta("Erro!", "Estoque já incluido em uma venda.", "error");
                $conexao -> insereRegistro("Tentativa da alteração de estoque.", $cadTime, $cadDate);
            } elseif ($resultadoEditar === 1) {
                alerta("Erro!", "Estoque já existente no tamanho desejado.", "error");
                $conexao -> insereRegistro("Tentativa da alteração de estoque.", $cadTime, $cadDate);
            } else {
                alerta("Concluído!", "Estoque editado com sucesso.", "success");
                $conexao -> insereRegistro("Alteração de estoque.", $cadTime, $cadDate);
            }
        }
        
        $estoque = $conexao -> exibeEstoque($codEstoque);
    }
?>