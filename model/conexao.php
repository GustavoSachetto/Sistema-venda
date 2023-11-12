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
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valor, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE 
        produto.nomeProduto LIKE '%$buscaNome%'   AND 
        produto.categoria   LIKE '%$buscaCate%'   AND 
        produto.genero      LIKE '%$buscaGen%'    AND 
        produto.marca       LIKE '%$buscaMarca%'  AND
        produto.tipo        LIKE '%$buscaTipo%'   AND
        produto.codProduto  LIKE '%$buscaCod%' ORDER BY produto.codProduto ASC";

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

    public function insereCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadNumero, $cadComplemento, $cadObservacao) {

        $insereCliente = $this -> pdo -> prepare ("insert into cliente(nomeCliente, cpf, CEP, UF, nResidencial, cidade, bairro, rua, tipoLogradouro, complemento, observacao) values (:n, :cpf, :cep, :uf, :numero, :cid, :bairro, :rua, :log, :comp, :obs)");

        $insereCliente->bindValue(":n", $cadNome);
        $insereCliente->bindValue(":cpf", $cadCpf);
        $insereCliente->bindValue(":cep", $cadCep);
        $insereCliente->bindValue(":uf", $cadUF);
        $insereCliente->bindValue(":cid", $cadCidade);
        $insereCliente->bindValue(":bairro", $cadBairro);
        $insereCliente->bindValue(":rua", $cadRua);
        $insereCliente->bindValue(":log", $cadLogradouro);
        $insereCliente->bindValue(":numero", $cadNumero);
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

    public function insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho) {
        $insereTamanhoProduto = $this -> pdo -> prepare("insert into tamanhop(quantidade, codProduto, codTam) values (:quant, :codP, :codT)");
        $insereTamanhoProduto->bindValue(":quant", $cadQuantidade);
        $insereTamanhoProduto->bindValue(":codP", $codProduto);
        $insereTamanhoProduto->bindValue(":codT", $codTamanho);
        $insereTamanhoProduto->execute();
    }

    public function deleteProduto($codProduto) {
        $deleteProduto = $this-> pdo -> prepare("DELETE FROM produto where codProduto = :codP");
        $deleteProduto->bindValue(":codP", $codProduto);
        $deleteProduto->execute();
    }

    public function deleteCliente($codCliente) {
        $deleteCliente = $this-> pdo -> prepare("DELETE FROM cliente where codCliente = :codC");
        $deleteCliente->bindValue(":codC", $codCliente);
        $deleteCliente->execute();
    }
}
?>