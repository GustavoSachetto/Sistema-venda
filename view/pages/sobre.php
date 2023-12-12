<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | Sobre projeto</title>
        <?php require ('../layout/head.php') ?>
        <link rel="stylesheet" href="../css/sobre.css">
    </head>
    <body>
        <?php require ('../layout/header.php') ?>
        <main>
            <section id="user">
                <div class="container-user">
                    <i class='bx bxs-user-circle'></i>
                    <div class="user">
                        <span>Douglas junior</span>
                        <span class="type-user">ADMIN</span>
                    </div>
                </div>
            </section>
            <article id="sobre">
                <h2>Sobre / projeto</h2>
                <section id="site" class="container-desc-site">
                    <h3>Descrição do site</h3>
                    <p>
                        O site foi projetado para as necessidades de uma empresa revendedora de roupa, onde consiste num sistema interno gerenciador de: clientes, produtos, estoques e vendas. Apartir disto teremos um roteiro breve obrigatorio na finalização de uma venda.
                    </p>
                    <h4>Proteções básicas</h4>
                    <p>
                        Para manter a integridade dos dados é necessário algumas verificações, que consiste em analizar alguns fatores antes de cadastrar ou alterar qualquer tipo de dado. Então verifique a lista abaixo alguns fatores que devem ser pontuados antes de qualquer alteração no site. 
                    </p>
                    <h4>A pontuar:</h4>
                    <ul>
                        <li>
                            Para cadastrar um <mark>estoque</mark> será necessario antes cadastrar um <mark>produto</mark> e um <mark>tamanho</mark>.
                        </li>
                        <li>
                            Para cadastrar uma <mark>venda</mark> será necessario antes cadastrar um <mark>cliente</mark> e um <mark>estoque</mark>.
                        </li>
                        <li>Não será possivel realizar alterações em <mark>clientes</mark> ou <mark>produtos</mark> que já foram cadastrados em uma <mark>venda</mark>.</li>
                        <li>Não será possivel realizar alterações no <mark>tamanho</mark> (estoque) que já foi cadastrado em uma <mark>venda</mark>.</li>
                    </ul>
                </section>
                <section id="tecnica" class="container-desc-tecnica">
                    <h3>Descrição Técnica</h3>
                    <p>
                        Esse projeto foi desenvolvido no intuito de gerar um sistema CRUD baseado em PHP, que no geral é um sistema no qual é possivel: <strong>Cadastrar, Exibir, Atualizar e Deletar</strong> itens em um banco de dados.
                    </p>
                    <section id="lista" class="container-lista">
                        <aside>
                            <h4>As tecnologias utilizadas nesse projeto são:</h4>
                            <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>PHP</li>
                                <li>SQL</li>
                                <li>BOOTSTRAP</li>
                                <li>BOXICONS</li>
                                <li>JAVASCRIPT</li>
                                <li>JQUERY</li>
                                <li>SWEETALERT2</li>
                                <li>CHARTJS</li>
                            </ul>
                        </aside>
                        <aside>
                            <h4>Tópicos interessantes elaborados nesse projeto:</h4>
                            <ul>
                                <li>(POO) Programação orientada a objetos</li>
                                <li>(PDO) Ligação com banco de dados atráves do php</li>
                                <li>(UI/UX) Interface responsiva e acessível</li>
                                <li>(Organização) facilidade na compreenção do codigo</li>
                                <li>(Flexibilidade) facilidade na alteração e implementação do codigo</li>
                                <li>(Consumo de API) Auto-preenchimento usando site de terceiros</li>
                            </ul>
                        </aside>
                    </section>
                </section>
            </article>
            <article id="contato">
                <section>
                    <h3>Contato criador</h3>
                    <a href="https://www.linkedin.com/in/gustavo-sachetto-60847727a/" target="_blank">Linkedin</a>
                    <a href="https://github.com/GustavoSachetto" target="_blank">Github</a>
                    <a href="https://gustavosachetto.github.io/Portfolio/" target="_blank">Portfólio</a>
                </section>
            </article>
        </main>
        <?php require ('../layout/footer.php') ?>
    </body>
</html>