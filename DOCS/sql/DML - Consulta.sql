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