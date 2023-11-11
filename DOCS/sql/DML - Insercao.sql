use projetovenda;

insert into cliente(nomeCliente, cpf, CEP, UF, nResidencial, cidade, bairro, rua, tipoLogradouro, complemento, observacao) values
("Antonio Rodrigues","55214047897","12345678","SP", 13 ,"São Bernando Do Campo","Jardim Alegre","José quintanilha","Casa","Andar 15",""),
("Silva da silva","78954625784","78945612","GO", 15 ,"Caieiras","Parque vitoria","Damasco","Casa","",""),
("Lima da silva","25078945617","87945658","SP", 26 ,"São Paulo","Parque paulista","Paulo Gustavo","Predio","Casa B",""),
("Felipe da Silva","55214547898","12345674","RJ", 9005,"Belford Roxo","Antonio fernandez","Avenida guilherme alcantra","Casa","",""),
("João da Silva","44216547897","12365678","SP", 288 ,"Franco da rocha","Jardim Triste","Faria lima","Casa","Nenhum",""),
("Felipe Zanuto","28921854789","12865678","AM", 55,"Francisco Morato","Jardins","Whiliam","Predio","nenhum","Cao Bravo"),
("Marcelo Andrade","55766547897","17365678","ES", 12, "Capitão dourado","Monte Verde","Pedreira andre","Rua","Casa A","Depois do meio dia"),
("Fernando Samparo","85214447897","14268878","SP", 333 ,"Lapa","Parque das graças","Wilbert","Casa","","Chamar por guilherme"),
("Gustavo Sachetto","12216337807","12363378","MG",23 ,"Praia Grande","Legre confrade","Damião Guerreiro","Casa","Casa C",""),
("Higor Lima","55268368802","12365008","SP", 5,"Mairiporam","Manganes dos jardins","Poupa tempo","Casa","","");

insert into produto(valor, nomeProduto, marca, tipo, genero, categoria) values
( "20.00", "Camisa rosa", "nike", "camiseta", "unisex" ,"roupas basicas"),
( "100.00","Camiseta Corinthians", "nike", "camiseta", "masculino", "roupas luxo"), 
( "15.00" , "Bandana Vermelha", "Lenços Plus", "Lenços", "Unisex", "Acessorio"),
( "20.00" , "Camisa Vermelha", "Nicoboco", "Camisetas", "Feminina", "Roupa"),
( "50.00" , "Calça Cargo Bege", "Nike", "Calças", "Masculino", "Calça"),
( "11.90" , "Cueca Box Vermelha", "Puma", "Cuecas", "Masculino", "Roupa intima"),
( "20.00" , "Baby Look Cinza", "Adidas", "Blusas", "Feminino", "Camiseta"),
( "2000.00" , " Baby Look Preta", "Prada", "Blusas", "Feminino", "Camiseta"),
( "15.00" , "Escapulatorio Corinthians", "Correntes E Cia", "Colares E Acessorios", "Unisex", "Acessorio"),
( "65.00" , "Camisa Branca Corinthians", "Nike", "Camisetas", "Unisex", "Roupa");

insert into tamanho(tipoTamanho) values
( "PP" ),
( "P" ),
( "M" ),
( "G" ),
( "GG" ),
( "XGG" );    

 insert into tamanhoP(codProduto, codTam, quantidade) values
( 1, 1 , 70 ),
( 2, 2 , 78 ),
( 3, 3 , 45 ),
( 4, 4 , 31 ),
( 5, 3 , 90 ),
( 6, 1 , 10 ),
( 7, 2 , 39 ),
( 8, 4 , 29 ),
( 9, 5 , 28 ),
( 10, 5 , 69 );

insert into venda(codCliente, dataHora) values
(  1 , "2022-04-19 12:04:25" ),
(  2 , "2022-06-08 15:04:25" ),
(  3 , "2023-10-25 20:10:30" ),
(  4 , "2022-12-01 14:25:25" ),
(  5 , "2022-10-29 15:45:38" ),
(  6 , "2023-06-15 05:04:45" ),
(  7 , "2022-08-08 13:06:25" ),
(  8 , "2022-08-08 21:04:25" ),
(  9 , "2023-01-20 23:50:25" ),
(  10 , "2022-02-08 22:30:25" ),
(  9 , "2023-04-19 12:04:25" ),
(  8 , "2022-06-08 15:04:25" ),
(  5 , "2022-10-25 20:10:30" ),
(  1 , "2023-12-01 14:25:25" ),
(  4 , "2022-10-29 15:45:38" ),
(  7 , "2022-06-15 05:04:45" ), 
(  2 , "2022-08-08 13:06:25" ),
(  3 , "2022-08-08 21:04:25" ),
(  5 , "2023-01-20 23:50:25" ),
(  6 , "2023-02-08 22:30:25" );

insert into vendaitem(valorUnitario, quantidadeVenda, codVenda, codProduto) values
( 20.00 , 16, 1, 1),
( 50.00 , 01, 10, 5),
( 100.00 , 5, 10, 2),
( 20.00 , 50, 4, 7),
( 11.90 , 30, 10, 6 ),
( 15.00  , 1, 7, 9 ),
( 45.00  , 5, 8, 4 ),
( 190.00 , 8, 10, 4 ),
( 78.00 , 29, 10, 3),
( 56.50 , 19, 7, 4),
( 90.00 , 15, 8, 2),
( 100.00, 29, 10, 3),
( 200.00 , 1, 2, 9),
( 77.00 , 80, 6, 3),
( 98.00 , 6, 7, 3),
( 8.00 , 9, 2, 1),
( 10.00 , 56, 4, 2),
( 38.00 , 100, 7, 4),
( 19.00 , 46, 2, 5),
( 50.80 , 89, 5, 3),
( 67.00 , 60, 1, 4),
( 45.00 , 80, 7, 4),
( 78.00 , 238, 5, 7),
( 70.00 , 209, 9, 4),
( 48.00 , 98, 7, 9),
( 98.00 , 17, 9, 7),
( 45.99 , 2 , 8, 1),
( 10.99 , 1, 5, 10),
( 89.99 , 60, 8, 7),
( 17.00 , 3, 4, 3),
( 67.00 , 5, 9, 6),
( 6.00 , 1, 2,8),
( 98.00 , 10, 6, 2),
( 56.99 , 89, 1, 5),
( 66.00 , 59, 7, 9),
( 56.00 , 78, 7, 10),
( 89.00 , 129, 5, 6),
( 88.00 , 46, 4, 9),
( 11.98 , 79, 6, 3),
( 98.00 , 79, 7, 8);