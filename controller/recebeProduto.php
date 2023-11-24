<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadNomeP = addslashes($_POST['txtNomeP']);
        $cadValor = addslashes($_POST['txtValor']);
        $cadCat = addslashes($_POST['txtCat']);
        $cadGen = addslashes($_POST['txtGen']);
        $cadTipo = addslashes($_POST['txtTipo']);
        $cadMarca = addslashes($_POST['txtMarca']);

        $resultadoCadastro = $conexao -> insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca);
        
        if ($resultadoCadastro === true) {
            echo '
            <script>
                Swal.fire({
                    title: "Concluído!",
                    text: "Produto cadastrado com sucesso.",
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
                    text: "Produto já existente.",
                    color: "var(--title-color)",
                    background: "var(--alert-color)",
                    icon: "error"
                });   
            </script>
            ';
        }
    }    
?>