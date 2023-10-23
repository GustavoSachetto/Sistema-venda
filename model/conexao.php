<?php 
class conexao{
    private $pdo;
    public function __construct($dbname, $host, $user, $password) {
        try {
            $this -> pdo = New PDO ("mysql:dbname=" . $dbname . ";host=" . $host, $user, $password);
            return "CONEXÃO DO PDO";
        } catch (PDOException $erro) {
            return "ERRO DE CONEXÃO NO PDO:" . $erro -> getMessage();
            exit();
        } catch (Exception $erro) {
            return "ERRO NÃO PASSOU DA CONEXÃO:" . $erro -> getMessage();
            exit();
        }
    }

    public function consultaCliente($buscaNome, $buscaCpf, $buscaCep, $buscaUF, $buscaCidade, $buscaBairro, $buscaCod) {
        
        $consulta = "SELECT * FROM cliente WHERE 
        nomeCliente LIKE '%$buscaNome%'   AND 
        cpf         LIKE '%$buscaCpf%'    AND 
        CEP         LIKE '%$buscaCep%'    AND 
        UF          LIKE '%$buscaUF%'     AND
        cidade      LIKE '%$buscaCidade%' AND
        bairro      LIKE '%$buscaBairro%' AND
        codCliente  LIKE '%$buscaCod%'     ";

        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaTamanho() {
        $consulta = "SELECT * FROM tamanho ORDER BY codTam ASC";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaProduto($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod) {
        $consulta = "SELECT * FROM produto WHERE 
        nomeProduto LIKE '%$buscaNome%'   AND 
        categoria   LIKE '%$buscaCate%'   AND 
        genero      LIKE '%$buscaGen%'    AND 
        marca       LIKE '%$buscaMarca%'  AND
        tipo        LIKE '%$buscaTipo%'   AND
        codProduto  LIKE '%$buscaCod%'     ";

        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaTamanhoProduto() {
        $consulta = "SELECT * FROM tamanhop ORDER BY codProduto ASC";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaBanco($consulta) {
        $consultaBanco = $this -> pdo -> query($consulta);
        $consultaBanco -> execute();

        while ($resultado = $consultaBanco -> fetchAll(PDO::FETCH_ASSOC)) {
            return $resultado;
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

    public function insereTamanho($cadTam){
        $insereTamanho = $this -> pdo -> prepare ("insert into tamanho(tipoTamanho)
        value (:t)");

        $insereTamanho->bindValue(":t", $cadTam);
        $insereTamanho->execute();
    }

    public function insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca, $cadQuantidade, $codProduto, $codTamanho) {
        $insereProduto = $this -> pdo -> prepare ("insert into produto(nomeProduto, valor, categoria, genero, tipo, marca) 
        values (:n, :v, :cat, :gen, :tipo, :marca)");

        $insereProduto->bindValue(":n", $cadNomeP);
        $insereProduto->bindValue(":v", $cadValor);
        $insereProduto->bindValue(":cat", $cadCat);
        $insereProduto->bindValue(":gen", $cadGen);
        $insereProduto->bindValue(":tipo", $cadTipo);
        $insereProduto->bindValue(":marca", $cadMarca);
        $insereProduto->execute();

        $this -> insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);
    }

    public function insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho) {
        $insereTamanhoProduto = $this -> pdo -> prepare("insert into tamanhop(quantidade, codProduto, codTam) values (:quant, :codP, :codT)");
        $insereTamanhoProduto->bindValue(":quant", $cadQuantidade);
        $insereTamanhoProduto->bindValue(":codP", $codProduto);
        $insereTamanhoProduto->bindValue(":codT", $codTamanho);
        $insereTamanhoProduto->execute();
    }
}
?>