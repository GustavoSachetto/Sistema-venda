<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);
    
    $clientes = $conexao -> consultaBanco("SELECT * FROM cliente");
    $estoques = $conexao -> exibeEstoques();

    function opcoesC($clientes) {
        foreach ($clientes as $item) {
            echo "<option value=" . $item['codCliente'] . ">" . $item['codCliente'] . " - " . $item['nomeCliente'] . " - " . $item['cpf'] . "</option>";
        }        
    }
    
    function opcoesE($estoques) {
        foreach ($estoques as $item) {
            echo "<option value=" . $item['codProduto'] . ">" . $item['codProduto'] . " - " . $item['nomeProduto'] . " - " . $item['tipoTamanho'] . " - " . $item['genero'] . " - " . $item['marca'] . "</option>";
        }        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadQuantidade = addslashes($_POST['txtQuantidade']);
        $codProduto =  addslashes($_POST['slcProduto']);
        $codTamanho = addslashes($_POST['slcTamanho']);

        $resultadoCadastro = $conexao -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);

        if ($resultadoCadastro === true) {
            echo '
            <script>
                Swal.fire({
                    title: "Concluído!",
                    text: "Estoque cadastrado com sucesso.",
                    color: "var(--title-color)",
                    background: "var(--alert-color)",
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
                    color: "var(--title-color)",
                    background: "var(--alert-color)",
                    icon: "error"
                });   
            </script>
            ';
        }
    }    
?>