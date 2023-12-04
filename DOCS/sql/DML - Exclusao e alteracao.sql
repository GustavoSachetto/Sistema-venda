use projetovenda;

update cliente set nomeCliente = "Paulo Albuquerque" where codCliente = 3;
update cliente set nomeCliente = "Tereza Aragão" where codCliente = 4;
update cliente set nomeCliente = "Jacinto Pereira" where codCliente = 5;

update produto set valor = "39.99" where codProduto = 6;
update produto set nomeProduto = "Camisa amarela" where codProduto = 1;
update produto set nomeProduto = "Calça Cargo branca" where codProduto = 6;
update produto set nomeProduto = "Bandana preta" where codProduto = 7;
update produto set nomeProduto = "Baby Look amarelo" where codProduto = 8;

update venda set dataHora = "2023-09-01 14:25:28" where codCliente = 5;
update venda set dataHora = "2023-12-15 16:35:28" where codCliente  = 2;
update venda set dataHora = "2023-04-06 14:56:28" where codCliente = 9;

update tamanho set tipoTamanho = "XXG" where codTam = 6;

delete from vendaitem where codVenda = 17;
delete from tamanhoP where codTam = 5;
delete from produto where codProduto = 1;

UPDATE cliente SET nomeCliente = 'Gustavo Sachetto', cpf = 12345678911, tipoLogradouro = 'Rua', bairro = 'Parque paulista', rua = 'Damasco', UF = 'SP', nResidencial = 288, cidade = 'Franco da rocha', CEP = '07855080', complemento = '', observacao = '' WHERE codCliente = 11;

UPDATE tamanhop SET quantidade = '40', codTam = '2' WHERE codEstoque = '8';

UPDATE tamanhop SET quantidade = '40' WHERE codEstoque = '8';