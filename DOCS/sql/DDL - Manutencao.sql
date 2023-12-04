use projetovenda;

alter table cliente drop column endereco;

alter table cliente add tipoLogradouro char(10) not null;
alter table cliente add bairro varchar(30) not null;
alter table cliente add rua varchar(30) not null;
alter table cliente add UF char(2) not null;
alter table cliente add nResidencial int not null;
alter table cliente add cidade varchar(30) not null;
alter table cliente add CEP char(8) not null;
alter table cliente add complemento varchar(10) null;
alter table cliente add observacao varchar(30) null;

alter table produto add tipo varchar(30) not null;
alter table produto add marca varchar(30) not null;
alter table produto add categoria varchar(30) not null;
alter table produto add genero char(10) not null;

alter table produto add
constraint uqProduto
unique (nomeProduto, tipo, marca, categoria, genero);

alter table produto drop column quantidade;

alter table venda add data date not null;
alter table venda add hora time not null;
alter table venda drop constraint fkprodutoVenda;
alter table venda drop column codProduto;

create table tamanho(
	codTam int auto_increment not null primary key,
    tipoTamanho char(5) unique
);

create table tamanhoP(
	quantidade int not null,
    codEstoque int auto_increment not null primary key,

	codProduto int not null,
	constraint fkcodProduto foreign key (codProduto) references produto(codProduto),

	codTam int not null,
	constraint fkcodTam foreign key(codTam) references tamanho(codTam)
);

alter table tamanhoP add constraint uqTam
unique(quantidade, codProduto, codTam);

create table vendaItem(
	valorUnitario decimal(7,2) not null,
    quantidadeVenda int not null,
    
    codVendaitem int auto_increment primary key not null,
    
    codVenda int not null,
    constraint fkvenda_vendaitem foreign key (codVenda) references venda(codVenda),
    
    codEstoque int not null,
    constraint fktamanhoP_vendaitem foreign key (codEstoque) references tamanhoP(codEstoque)
);

create table notificacao(
	codNotificacao int auto_increment primary key not null,
    titulo varchar(30) not null,
    conteudo varchar(80) not null,
    hora time not null,
    data date not null
);