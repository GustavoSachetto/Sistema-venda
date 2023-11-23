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

SELECT venda.*, SUM(vendaItem.valorUnitario) FROM venda 
INNER JOIN vendaItem ON venda.codVenda = vendaItem.codVenda GROUP BY codVenda;