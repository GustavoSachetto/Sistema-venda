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
    
    public function insereCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadNumero, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadComplemento, $cadObservacao) {

        $insereCliente = $this -> pdo -> prepare ("insert into cliente(nomeCliente, cpf, CEP, UF, nResidencial, cidade, bairro, rua, tipoLogradouro, complemento, observacao) values (:n, :cpf, :cep, :uf, :numero, :cid, :bairro, :rua, :log, :comp, :obs)");

        $insereCliente->bindValue(":n", $cadNome);
        $insereCliente->bindValue(":cpf", $cadCpf);
        $insereCliente->bindValue(":cep", $cadCep);
        $insereCliente->bindValue(":uf", $cadUF);
        $insereCliente->bindValue(":numero", $cadNumero);
        $insereCliente->bindValue(":cid", $cadCidade);
        $insereCliente->bindValue(":bairro", $cadBairro);
        $insereCliente->bindValue(":rua", $cadRua);
        $insereCliente->bindValue(":log", $cadLogradouro);
        $insereCliente->bindValue(":comp", $cadComplemento);
        $insereCliente->bindValue(":obs", $cadObservacao);
        $insereCliente->execute();
    }

    public function insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca) {
        $insereProduto = $this -> pdo -> prepare ("insert into produto(nomeProduto, valor, categoria, genero, tipo, marca) 
        values (:n, :v, :cat, :gen, :tipo, :marca)");

        $insereProduto->bindValue(":n", $cadNomeP);
        $insereProduto->bindValue(":v", $cadValor);
        $insereProduto->bindValue(":cat", $cadCat);
        $insereProduto->bindValue(":gen", $cadGen);
        $insereProduto->bindValue(":tipo", $cadTipo);
        $insereProduto->bindValue(":marca", $cadMarca);
        $insereProduto->execute();
    }

    public function insereTamanho($cadTam){
        $insereTamanho = $this -> pdo -> prepare ("insert into tamanho(tipoTamanho)
        value (:t)");

        $insereTamanho->bindValue(":t", $cadTam);
        $insereTamanho->execute();
    }
}
?>