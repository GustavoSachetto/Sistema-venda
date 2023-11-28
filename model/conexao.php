<?php 
class conexao {
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
        codCliente  LIKE '%$buscaCod%'    ORDER BY cliente.codCliente ASC";

        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaTamanho() {
        $consulta = "SELECT * FROM tamanho ORDER BY codTam ASC";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaVenda($buscaCodV, $buscaCpf, $buscaCodC, $buscaData) {
        $consulta = "SELECT venda.*, cliente.cpf, SUM(vendaItem.valorUnitario) FROM venda INNER JOIN cliente ON venda.codCliente = cliente.codCliente INNER JOIN vendaItem ON venda.codVenda = vendaItem.codVenda WHERE 
        venda.codVenda LIKE '%$buscaCodV%' AND
        venda.codCliente LIKE '%$buscaCodC%' AND
        cliente.cpf LIKE '%$buscaCpf%' AND
        venda.dataHora LIKE '%$buscaData%' GROUP BY codVenda ORDER BY venda.codVenda ASC ";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaProduto($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod) {
        $consulta = "SELECT * FROM produto WHERE 
        produto.nomeProduto LIKE '%$buscaNome%'   AND 
        produto.categoria   LIKE '%$buscaCate%'   AND 
        produto.genero      LIKE '%$buscaGen%'    AND 
        produto.marca       LIKE '%$buscaMarca%'  AND
        produto.tipo        LIKE '%$buscaTipo%'   AND
        produto.codProduto  LIKE '%$buscaCod%' ORDER BY produto.codProduto ASC";

        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function consultaEstoque($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod, $buscaCodTam) {
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valor, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE 
        produto.nomeProduto LIKE '%$buscaNome%'   AND 
        produto.categoria   LIKE '%$buscaCate%'   AND 
        produto.genero      LIKE '%$buscaGen%'    AND 
        produto.marca       LIKE '%$buscaMarca%'  AND
        produto.tipo        LIKE '%$buscaTipo%'   AND
        tamanho.codTam      LIKE '%$buscaCodTam%' AND
        produto.codProduto  LIKE '%$buscaCod%' ORDER BY produto.codProduto ASC";

        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function exibeEstoques() {
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valor, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam ORDER BY produto.codProduto ASC";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }
    public function exibeProduto($codProduto) {
        $consulta = "SELECT * FROM produto WHERE produto.codProduto = '$codProduto'";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado;
    }

    public function exibeCliente($codCliente) {
        $consulta = "SELECT * FROM cliente WHERE cliente.codCliente = '$codCliente'";
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

        $insereCliente = $this -> pdo -> prepare ("INSERT INTO cliente(nomeCliente, cpf, CEP, UF, nResidencial, cidade, bairro, rua, tipoLogradouro, complemento, observacao) VALUES (:n, :cpf, :cep, :uf, :numero, :cid, :bairro, :rua, :log, :comp, :obs)");

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
        
        $validaCliente = $this->validaCliente($cadCpf);
        
        if ($validaCliente === 0) {
            $insereCliente->execute();
            return true;
        } else {
            return false;
        }
    }

    public function insereTamanho($cadTam){
        $insereTamanho = $this -> pdo -> prepare ("INSERT INTO tamanho(tipoTamanho) VALUE (:t)");

        $insereTamanho->bindValue(":t", $cadTam);

        $validaTamanho = $this->validaTamanho($cadTam);

        if ($validaTamanho === 0) {
            $insereTamanho->execute();
            return true;
        } else {
            return false;
        }
    }

    public function insereProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca) {
        $insereProduto = $this -> pdo -> prepare ("INSERT INTO produto(nomeProduto, valor, categoria, genero, tipo, marca) 
        VALUES (:n, :v, :cat, :gen, :tipo, :marca)");

        $insereProduto->bindValue(":n", $cadNomeP);
        $insereProduto->bindValue(":v", $cadValor);
        $insereProduto->bindValue(":cat", $cadCat);
        $insereProduto->bindValue(":gen", $cadGen);
        $insereProduto->bindValue(":tipo", $cadTipo);
        $insereProduto->bindValue(":marca", $cadMarca);

        $validaProduto = $this->validaProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca);

        if ($validaProduto === 0) {
            $insereProduto->execute();
            return true;
        } else {
            return false;
        }
    }

    public function insereTamanhoProduto($cadQuantidade, $codProduto, $codTamanho) {
        $insereTamanhoProduto = $this -> pdo -> prepare("INSERT INTO tamanhop(quantidade, codProduto, codTam) VALUES (:quant, :codP, :codT)");
        $insereTamanhoProduto->bindValue(":quant", $cadQuantidade);
        $insereTamanhoProduto->bindValue(":codP", $codProduto);
        $insereTamanhoProduto->bindValue(":codT", $codTamanho);

        $validaTamanhoProduto = $this->validaTamanhoProduto($cadQuantidade, $codProduto, $codTamanho);

        if ($validaTamanhoProduto === 0) {
            $insereTamanhoProduto->execute();
            return true;
        } else {
            return false;
        }
    }

    public function validaCliente($cadCpf) {
        $consulta = "SELECT COUNT(*) FROM cliente WHERE cpf = '$cadCpf'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function validaTamanho($cadTam) {
        $consulta = "SELECT COUNT(*) FROM tamanho WHERE tipoTamanho = '$cadTam'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }
    
    public function validaProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca) {
        $consulta = "SELECT COUNT(*) FROM produto WHERE 
        nomeProduto = '$cadNomeP' AND
        valor       = '$cadValor' AND
        categoria   = '$cadCat  ' AND
        genero      = '$cadGen  ' AND
        tipo        = '$cadTipo ' AND
        marca       = '$cadMarca' ";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function validaTamanhoProduto($cadQuantidade, $codProduto, $codTamanho) {
        $consulta = "SELECT COUNT(*) FROM tamanhop WHERE 
        quantidade = '$cadQuantidade' AND
        codProduto = '$codProduto   ' AND
        codTam     = '$codTamanho   ' ";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }
    
    public function integridadeProduto($codProduto) {
        $consulta = "SELECT COUNT(*) FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        WHERE produto.codProduto = '$codProduto'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function integridadeCliente($codCliente) {
        $consulta = "SELECT COUNT(*) FROM cliente
        INNER JOIN venda ON venda.codCliente = cliente.codCliente
        WHERE cliente.codCliente = '$codCliente'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }
    
    public function atualizaProduto($cadNomeP, $cadValor, $cadCat, $cadGen, $cadTipo, $cadMarca, $codProduto) {
        $atualizaProduto = $this-> pdo -> prepare("UPDATE produto SET nomeProduto = :n, valor = :v, tipo = :tipo, marca = :marca, categoria = :cat, genero = :gen WHERE codProduto = :codP;");
        $atualizaProduto->bindValue(":n", $cadNomeP);
        $atualizaProduto->bindValue(":v", $cadValor);
        $atualizaProduto->bindValue(":cat", $cadCat);
        $atualizaProduto->bindValue(":gen", $cadGen);
        $atualizaProduto->bindValue(":tipo", $cadTipo);
        $atualizaProduto->bindValue(":marca", $cadMarca);
        $atualizaProduto->bindValue(":codP", $codProduto);
        
        $integridadeProduto = $this->integridadeProduto($codProduto);
        
        if ($integridadeProduto === 0) {
            $atualizaProduto->execute();
            return true;
        } else {
            return false;
        }
    }
    
    public function atualizaCliente($cadNome, $cadCpf, $cadCep, $cadUF, $cadCidade, $cadBairro, $cadRua, $cadLogradouro, $cadNumero, $cadComplemento, $cadObservacao, $codCliente) {
        $atualizaCliente = $this-> pdo -> prepare("UPDATE cliente SET nomeCliente = :n, cpf = :cpf, tipoLogradouro = :log, bairro = :bairro, rua = :rua, UF = :uf, nResidencial = :numero, cidade = :cid, CEP = :cep, complemento = :comp, observacao = :obs WHERE codCliente = :codC;");
        $atualizaCliente->bindValue(":n", $cadNome);
        $atualizaCliente->bindValue(":cpf", $cadCpf);
        $atualizaCliente->bindValue(":cep", $cadCep);
        $atualizaCliente->bindValue(":uf", $cadUF);
        $atualizaCliente->bindValue(":cid", $cadCidade);
        $atualizaCliente->bindValue(":bairro", $cadBairro);
        $atualizaCliente->bindValue(":rua", $cadRua);
        $atualizaCliente->bindValue(":log", $cadLogradouro);
        $atualizaCliente->bindValue(":numero", $cadNumero);
        $atualizaCliente->bindValue(":comp", $cadComplemento);
        $atualizaCliente->bindValue(":obs", $cadObservacao);
        $atualizaCliente->bindValue(":codC", $codCliente);
        
        $integridadeCliente = $this->integridadeCliente($codCliente);
        
        if ($integridadeCliente === 0) {
            $atualizaCliente->execute();
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduto($codProduto) {
        $deleteProduto = $this-> pdo -> prepare("DELETE FROM produto where codProduto = :codP");
        $deleteProduto->bindValue(":codP", $codProduto);

        $integridadeProduto = $this->integridadeProduto($codProduto);
        
        if ($integridadeProduto === 0) {
            $deleteProduto->execute();
            return true;
        } else {
            return false;
        }
    }

    public function deleteCliente($codCliente) {
        $deleteCliente = $this-> pdo -> prepare("DELETE FROM cliente where codCliente = :codC");
        $deleteCliente->bindValue(":codC", $codCliente);
        
        $integridadeCliente = $this->integridadeCliente($codCliente);
        
        if ($integridadeCliente === 0) {
            $deleteCliente->execute();
            return true;
        } else {
            return false;
        }
    }
}
?>