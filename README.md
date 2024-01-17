# Sistema-venda
![SV-inicio](https://github.com/GustavoSachetto/Sistema-venda/assets/136517074/e79f5dc0-b521-4581-8612-ab09617e41bd)

__Sobre:__ Analisando uma loja de roupa, notei uma grande dificuldade no controle físico de seus clientes e produtos. Com base nisso realizei um projeto pensando em trazer este controle de maneira virtual. Ao final deste projeto trouxe um site com todo o controle de clientes e produtos da loja sem afetar sua regra de negócio, tornando-o mais eficiente e com menor probabilidade de erros.

__Link:__ https://sv-gustavo-sachetto.000webhostapp.com/index.php

__Proteções básicas:__
Para manter a integridade dos dados é necessário algumas verificações, que consiste em analizar alguns fatores antes de cadastrar ou alterar qualquer tipo de dado. Então verifique a lista abaixo alguns fatores que devem ser pontuados antes de qualquer alteração no site.

__A pontuar:__
* Para cadastrar um __estoque__ será necessario antes cadastrar um __produto__ e um __tamanho__.
* Para cadastrar uma __venda__ será necessario antes cadastrar um __cliente__ e um __estoque__.
* Não será possivel realizar alterações em __clientes__ ou __produtos__ que já foram cadastrados em uma __venda__.
* Não será possivel realizar alterações no __tamanho__ (estoque) que já foi cadastrado em uma __venda__.

## Descrição Técnica
Esse projeto foi desenvolvido no intuito de gerar um sistema CRUD baseado em PHP, que no geral é um sistema no qual é possivel: __Cadastrar, Exibir, Atualizar e Deletar__ itens em um banco de dados.

__As tecnologias utilizadas nesse projeto são:__
* HTML
* CSS
* PHP
* SQL
* BOOTSTRAP
* BOXICONS
* JAVASCRIPT
* JQUERY
* SWEETALERT2
* CHARTJS

__Tópicos interessantes elaborados nesse projeto:__
* (PDO) Ligação com banco de dados atráves do php
* (UI/UX) Interface responsiva e acessível
* (Organização) facilidade na compreenção do codigo
* (Flexibilidade) facilidade na alteração e implementação do codigo
* (Consumo de API) Auto-preenchimento usando site de terceiros

**************************
