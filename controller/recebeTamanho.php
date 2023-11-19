<?php
    require_once '../../model/conexao.php';
    $config = parse_ini_file('../../model/config.ini');
    $conexao = new conexao ($config['dbname'], $config['host'], $config['user'], $config['password']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cadTam = addslashes($_POST['txtTamanho']);
        
        $resultadoCadastro = $conexao -> insereTamanho($cadTam);

        if ($resultadoCadastro === true) {
            echo '
            <script>
                Swal.fire({
                    title: "Concluído!",
                    text: "Tamanho cadastrado com sucesso.",
                    icon: "success"
                });   
            </script>
            ';
        } else {
            echo '
            <script>
                Swal.fire({
                    title: "Erro!",
                    text: "Tamanho já existente.",
                    icon: "error"
                });   
            </script>
            ';
        }
    }
?>