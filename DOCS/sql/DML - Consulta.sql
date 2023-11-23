use projetovenda;

select * from cliente;

select * from produto;

select * from tamanho;

select * from tamanhoP;

select * from venda;

select * from vendaitem;

select cliente.nomeCliente, produto.nomeProduto from cliente 
inner join venda on cliente.codCliente = venda.codCliente
inner join vendaitem on venda.codVenda = vendaItem.codVenda
inner join produto on vendaItem.codProduto = produto.codProduto;

SELECT produto.codProduto, produto.nomeProduto, produto.valor, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam;

SELECT produto.codProduto, produto.nomeProduto, produto.valor, produto.tipo, produto.marca, produto.categoria, produto.genero, tamanho.tipoTamanho, tamanhop.quantidade FROM produto
INNER JOIN tamanhop ON tamanhop.codProduto = produto.codProduto
INNER JOIN tamanho ON tamanho.codTam = tamanhop.codTam WHERE 
produto.nomeProduto LIKE '%%'   AND 
produto.categoria   LIKE '%%'   AND 
produto.genero      LIKE '%%'    AND 
produto.marca       LIKE '%%'  AND
produto.tipo        LIKE '%%'   AND
tamanho.codTam      LIKE '%%'  AND
produto.codProduto  LIKE '%%'  ORDER BY produto.codProduto ASC;

SELECT venda.*, cliente.nomeCliente, SUM(vendaItem.valorUnitario) FROM venda 
INNER JOIN cliente ON venda.codCliente = cliente.codCliente
INNER JOIN vendaItem ON venda.codVenda = vendaItem.codVenda GROUP BY codVenda ORDER BY venda.codVenda ASC;

SELECT venda.*, cliente.cpf, SUM(vendaItem.valorUnitario) FROM venda 
INNER JOIN cliente ON cliente.codCliente = venda.codCliente 
INNER JOIN vendaItem ON vendaItem.codVenda = venda.codVenda WHERE 
venda.codVenda LIKE '%%' AND
venda.codCliente LIKE '%%' AND
cliente.cpf LIKE '%%' AND
venda.dataHora LIKE '%%' GROUP BY venda.codVenda ORDER BY venda.codVenda ASC;