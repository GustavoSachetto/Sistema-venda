<?php 
class conexao{
    private $pdo;
    public function __construct($dbname, $host, $user, $password) {
        try {
            $this -> pdo = New PDO ("mysql:dbname=" . $dbname . ";host=" . $host, $user, $password);
            echo "Conexão com PDO";
        } catch (PDOException $erro) {
            echo "Erro de conexão no PDO: " . $erro -> getMessage();
            exit();
        } catch (Exception $erro) {
            echo "Erro não passou da conexão: " . $erro -> getMessage();
            exit();
        }
    }
}
?>