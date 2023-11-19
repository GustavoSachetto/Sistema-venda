<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    const PRODUTO = "SELECT * FROM produto";

    $produtos = $conexao -> consultaBanco(PRODUTO);
    $tamanhos = $conexao -> consultaTamanho();

    function opcoesP($produtos) {
        foreach ($produtos as $item) {
            echo "<option value=" . $item['codProduto'] . ">" . $item['nomeProduto'] . "</option>";
        }        
    }
    
    function opcoesT($tamanhos) {
        foreach ($tamanhos as $item) {
            echo "<option value=" . $item['codTam'] . ">" . $item['tipoTamanho'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadQuantidade = addslashes($_POST['txtQuantidade']);
        $codProduto = $_POST['slcProduto'];
        $codTamanho = addslashes($_POST['slcTamanho']);

        $resultadoCadastro = $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);

        if ($resultadoCadastro === true) {
            echo '
            <script>
                Swal.fire({
                    title: "Concluído!",
                    text: "Estoque cadastrado com sucesso.",
                    icon: "success"
                });   
            </script>
            ';
        } else {
            echo '
            <script>
                Swal.fire({
                    title: "Erro!",
                    text: "Estoque já existente.",
                    icon: "error"
                });   
            </script>
            ';
        }
    }    
?>