create database projetovenda;

use projetovenda;

create table produto(
	codProduto int auto_increment not null primary key,
	nomeProduto varchar (70) not null,
	quantidade int not null,
	valor decimal(7,2) not null
);

create table cliente(
	nomeCliente varchar(60) not null, 
	cpf char (11) not null unique,
	endereco varchar(100) null,
	codCliente int auto_increment not null primary key
);

create table venda(
  codVenda int auto_increment not null primary key,
  
  codCliente int not null,
  constraint fkclienteVenda foreign key (codCliente) references cliente (codCliente),
  
  codProduto int not null,
  constraint fkprodutoVenda foreign key (codProduto) references produto (codProduto)
);