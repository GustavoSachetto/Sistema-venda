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

    public function conversorMoeda($converter) {
        $resultado = "R$ " . number_format($converter, 2, ",", ".");
        return $resultado;
    }

    public function consultaRegistro() {
        $consulta = "SELECT * FROM registro ORDER BY codRegistro DESC";
        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }

    public function consultaCliente($buscaNome, $buscaCpf, $buscaCep, $buscaUF, $buscaCidade, $buscaBairro, $buscaCod) {
        $consulta = "SELECT * FROM cliente WHERE 
        nomeCliente LIKE '%$buscaNome%'   AND 
        cpf         LIKE '%$buscaCpf%'    AND 
        CEP         LIKE '%$buscaCep%'    AND 
        UF          LIKE '%$buscaUF%'     AND
        cidade      LIKE '%$buscaCidade%' AND
        bairro      LIKE '%$buscaBairro%' ORDER BY cliente.codCliente ASC";

        if (!empty($buscaCod)) {
            $consulta = "SELECT * FROM cliente WHERE cliente.codCliente = '$buscaCod'";
        }

        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }

    public function consultaTamanho() {
        $consulta = "SELECT * FROM tamanho ORDER BY codTam ASC";
        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }

    public function consultaVenda($buscaCodV, $buscaCpf, $buscaCodC, $buscaData) {
        $consulta = "SELECT venda.*, cliente.cpf, SUM(vendaitem.valorUnitario * vendaitem.quantidadeVenda) AS total FROM venda INNER JOIN cliente ON venda.codCliente = cliente.codCliente INNER JOIN vendaitem ON venda.codVenda = vendaitem.codVenda WHERE 
        venda.codCliente LIKE '%$buscaCodC%' AND
        cliente.cpf LIKE '%$buscaCpf%' AND
        venda.data LIKE '%$buscaData%' GROUP BY codVenda ORDER BY venda.codVenda ASC ";

        if (!empty($buscaCodV)) {
            $consulta = "SELECT venda.*, cliente.cpf, SUM(vendaitem.valorUnitario * vendaitem.quantidadeVenda) AS total FROM venda INNER JOIN cliente ON venda.codCliente = cliente.codCliente INNER JOIN vendaitem ON venda.codVenda = vendaitem.codVenda WHERE venda.codVenda = '$buscaCodV'";
        }

        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }

    public function consultaProduto($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod) {
        $consulta = "SELECT * FROM produto WHERE 
        produto.nomeProduto LIKE '%$buscaNome%'   AND 
        produto.categoria   LIKE '%$buscaCate%'   AND 
        produto.genero      LIKE '%$buscaGen%'    AND 
        produto.marca       LIKE '%$buscaMarca%'  AND
        produto.tipo        LIKE '%$buscaTipo%' ORDER BY produto.codProduto ASC";

        if (!empty($buscaCod)) {
            $consulta = "SELECT * FROM produto WHERE produto.codProduto  = '$buscaCod'";
        }

        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }

    public function consultaEstoque($buscaNome, $buscaCate, $buscaGen, $buscaMarca, $buscaTipo, $buscaCod, $buscaCodTam) {
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valorVenda, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade, tamanhop.codEstoque FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE 
        produto.nomeProduto LIKE '%$buscaNome%'   AND 
        produto.categoria   LIKE '%$buscaCate%'   AND 
        produto.genero      LIKE '%$buscaGen%'    AND 
        produto.marca       LIKE '%$buscaMarca%'  AND
        produto.tipo        LIKE '%$buscaTipo%'   AND
        tamanho.codTam      LIKE '%$buscaCodTam%' ORDER BY tamanhop.codEstoque ASC";
        
        if (!empty($buscaCod)) {
            $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valorVenda, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade, tamanhop.codEstoque FROM produto INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE tamanhop.codEstoque  = '$buscaCod'";
        }

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

    public function estoqueVenda() {
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valorVenda, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade, tamanhop.codEstoque FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam ORDER BY tamanhop.codEstoque ASC";

        $resultado = $this -> consultaBanco($consulta);
        return $resultado;
    }
    
    public function exibeEstoque($codEstoque) {
        $consulta = "SELECT produto.codProduto, produto.nomeProduto, produto.valorVenda, produto.tipo, produto.marca, produto.categoria, produto.genero,  tamanho.codTam, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE tamanhop.codEstoque = '$codEstoque'";

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

    public function insereRegistro($cadTexto, $cadTime, $cadDate){
        $insereRegistro = $this -> pdo -> prepare ("INSERT INTO registro(texto, hora, data) VALUE (:t, :h, :d)");
        $insereRegistro->bindValue(":t", $cadTexto);
        $insereRegistro->bindValue(":h", $cadTime);
        $insereRegistro->bindValue(":d", $cadDate);

        $insereRegistro->execute();
    }

    public function insereProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca) {
        $insereProduto = $this -> pdo -> prepare ("INSERT INTO produto(nomeProduto, valorCusto, valorVenda, categoria, genero, tipo, marca) 
        VALUES (:n, :vc, :vv, :cat, :gen, :tipo, :marca)");

        $insereProduto->bindValue(":n", $cadNomeP);
        $insereProduto->bindValue(":vc", $cadValorC);
        $insereProduto->bindValue(":vv", $cadValorV);
        $insereProduto->bindValue(":cat", $cadCat);
        $insereProduto->bindValue(":gen", $cadGen);
        $insereProduto->bindValue(":tipo", $cadTipo);
        $insereProduto->bindValue(":marca", $cadMarca);

        $validaProduto = $this->validaProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca);

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

        $validaTamanhoProduto = $this->validaTamanhoProduto($codProduto, $codTamanho);

        if ($validaTamanhoProduto === 0) {
            $insereTamanhoProduto->execute();
            return true;
        } else {
            return false;
        }
    }

    public function insereVenda($codCliente, $cadDate, $cadTime) {
        $insereVenda = $this -> pdo -> prepare("INSERT INTO venda(codCliente, data, hora) VALUE (:codC, :date, :time)");
        $insereVenda->bindValue(":codC", $codCliente);
        $insereVenda->bindValue(":date", $cadDate);
        $insereVenda->bindValue(":time", $cadTime);
        $consulta = "SHOW TABLE STATUS LIKE 'venda'";
        $resultado = $this -> consultaBanco($consulta);
        
        $insereVenda->execute();

        return $resultado[0]['Auto_increment'];
    }

    public function insereVendaItem($codEstoque, $codVenda, $cadQuant, $cadValor) {
        $insereVendaItem = $this -> pdo -> prepare("INSERT vendaitem(codEstoque, codVenda, quantidadeVenda, valorUnitario) VALUE (:codE , :codV, :quant, :valor)");
        $insereVendaItem->bindValue(":codE", $codEstoque);
        $insereVendaItem->bindValue(":codV", $codVenda);
        $insereVendaItem->bindValue(":quant", $cadQuant);
        $insereVendaItem->bindValue(":valor", $cadValor);

        $integridadeVendaItem = $this -> integridadeVendaItem($codEstoque, $cadQuant, $codVenda);

        if ($integridadeVendaItem === true) {
            $insereVendaItem->execute();
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
    
    public function validaProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca) {
        $consulta = "SELECT COUNT(*) FROM produto WHERE 
        nomeProduto = '$cadNomeP' AND
        valorCusto  = '$cadValorC'AND
        valorVenda  = '$cadValorV'AND
        categoria   = '$cadCat  ' AND
        genero      = '$cadGen  ' AND
        tipo        = '$cadTipo ' AND
        marca       = '$cadMarca' ";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function validaTamanhoProduto($codProduto, $codTamanho) {
        $consulta = "SELECT COUNT(*) FROM tamanhop WHERE 
        codProduto = '$codProduto   ' AND
        codTam     = '$codTamanho   ' ";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function validaVendaItem($codEstoque) {
        $consulta = "SELECT tamanhop.quantidade FROM tamanhop WHERE tamanhop.codEstoque = '$codEstoque'";
        $resultado = $this -> consultaBanco($consulta);

        return $resultado[0]['quantidade'];
    }

    
    
    public function integridadeProduto($codProduto) {
        $consulta = "SELECT COUNT(*) FROM produto
        INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
        WHERE produto.codProduto = '$codProduto'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }

    public function integridadeEstoque($codEstoque, $codProduto, $cadTam) {

        $consulta = "SELECT COUNT(*) FROM tamanhop INNER JOIN vendaitem ON vendaitem.codEstoque = tamanhop.codEstoque WHERE tamanhop.codEstoque = '$codEstoque'";
        $verifica1 = $this -> consultaBanco($consulta);

        $consulta = "SELECT COUNT(*) FROM tamanhop WHERE tamanhop.codProduto = '$codProduto' AND tamanhop.codTam = '$cadTam'";
        $verifica2 = $this -> consultaBanco($consulta);

        $consulta = "SELECT COUNT(*) FROM tamanhop WHERE tamanhop.codEstoque = '$codEstoque' AND tamanhop.codTam = '$cadTam'";
        $verifica3 = $this -> consultaBanco($consulta);

        if ($verifica1[0]["COUNT(*)"] > 0 && $verifica3[0]["COUNT(*)"] == 0) {
            $integridade = 2;
        } else if ($verifica2[0]["COUNT(*)"] > 0 && $verifica3[0]["COUNT(*)"] == 0) {
            $integridade = 1;
        } else {
            $integridade = 0;
        }
        
        return $integridade;
    }
    
    public function integridadeVendaItem($codEstoque, $cadQuant, $codVenda) {
        $quantidadeExistente = $this -> validaVendaItem($codEstoque);
        $quantidadeTotal = intval($quantidadeExistente) - intval($cadQuant);
    
        $integridadeVendaItem = $this -> pdo -> prepare("UPDATE tamanhop SET quantidade = :quantT WHERE codEstoque = :codE");
        $integridadeVendaItem->bindValue(":quantT", $quantidadeTotal);
        $integridadeVendaItem->bindValue(":codE", $codEstoque);
        
        if ($quantidadeTotal >= 0) {
            $integridadeVendaItem->execute();
            return true;
        } else {
            $this -> deleteVenda($codVenda);
            return false;
        }
    }

    public function integridadeCliente($codCliente) {
        $consulta = "SELECT COUNT(*) FROM cliente
        INNER JOIN venda ON venda.codCliente = cliente.codCliente
        WHERE cliente.codCliente = '$codCliente'";
        $resultado = $this -> consultaBanco($consulta);
        
        return $resultado[0]["COUNT(*)"];
    }
    
    public function atualizaProduto($cadNomeP, $cadValorC, $cadValorV, $cadCat, $cadGen, $cadTipo, $cadMarca, $codProduto) {
        $atualizaProduto = $this-> pdo -> prepare("UPDATE produto SET nomeProduto = :n, valorCusto = :vc, valorVenda = :vv, tipo = :tipo, marca = :marca, categoria = :cat, genero = :gen WHERE codProduto = :codP;");
        $atualizaProduto->bindValue(":n", $cadNomeP);
        $atualizaProduto->bindValue(":vc", $cadValorC);
        $atualizaProduto->bindValue(":vv", $cadValorV);
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
    
    public function atualizaEstoque($cadQuantidade, $cadTam, $codEstoque, $codProduto) {
        $atualizaEstoque = $this-> pdo -> prepare("UPDATE tamanhop SET quantidade = :quant, codTam = :codTam WHERE codEstoque = :codE");
        $atualizaEstoque->bindValue(":quant", $cadQuantidade);
        $atualizaEstoque->bindValue(":codTam", $cadTam);
        $atualizaEstoque->bindValue(":codE", $codEstoque);
        
        $integridadeEstoque = $this->integridadeEstoque($codEstoque, $codProduto, $cadTam);
        
        if ($integridadeEstoque === 0) {
            $atualizaEstoque->execute();
            return $integridadeEstoque;
        } else {
            return $integridadeEstoque;
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

    public function deleteProduto($codProduto, $cadDate, $cadTime) {
        $deleteProduto = $this-> pdo -> prepare("DELETE FROM produto where codProduto = :codP");
        $deleteProduto->bindValue(":codP", $codProduto);

        $integridadeProduto = $this->integridadeProduto($codProduto);
        
        if ($integridadeProduto === 0) {
            $deleteProduto->execute();
            $this -> insereRegistro("Produto deletado.", $cadTime, $cadDate);
            return true;
        } else {
            $this -> insereRegistro("Tentativa de deletar produto.", $cadTime, $cadDate);
            return false;
        }
    }

    public function deleteCliente($codCliente, $cadDate, $cadTime) {
        $deleteCliente = $this-> pdo -> prepare("DELETE FROM cliente where codCliente = :codC");
        $deleteCliente->bindValue(":codC", $codCliente);
        
        $integridadeCliente = $this->integridadeCliente($codCliente);
        
        if ($integridadeCliente === 0) {
            $deleteCliente->execute();
            $this -> insereRegistro("Cliente deletado.", $cadTime, $cadDate);
            return true;
        } else {
            $this -> insereRegistro("Tentativa de deletar cliente.", $cadTime, $cadDate);
            return false;
        }
    }

    public function deleteVenda($codVenda) {
        $deleteVenda = $this-> pdo -> prepare("DELETE FROM venda where codVenda = :codV");
        $deleteVenda->bindValue(":codV", $codVenda);
    }
}
?>