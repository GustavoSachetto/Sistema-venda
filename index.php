<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema-venda | Início painel</title>
        
        <link rel="shortcut icon" href="view/img/logo.png" type="image/x-icon">        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/painel.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="view/js/script.js"></script>
        <script src="view/js/grafico.js"></script>
    </head>
    <body>
        <?php require 'controller/exibePainel.php'?>
        <script> var vendaMes = <?= json_encode(grafico($vendas))?>;</script> 
        <nav class="sidebar close">
            <header>
                <div class="container-header">
                    <span class="container-img">
                        <img src="view/img/logo.png" alt="logo">
                    </span>
                    <span class="text container-text">
                        <h4>Sistema-venda</h4>
                        <span>Projeto backend</span>
                    </span>
                    <i class="bx bx-chevron-left btn-sidebar"></i>
                </div>
                <div class="container-search">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="Buscar...">
                </div>
                <nav class="container-nav">
                    <ul>
                        <li>
                            <a class="menu-link" href="index.php">
                                <i class='bx bx-home-alt'></i>
                                <div class="text">
                                    <span class="painel-link">Painel</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="menu-link" href="view/pages/sobre.php">
                                <i class='bx bx-message-square-detail' ></i>
                                <div class="text">
                                    <span class="painel-link">Sobre</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown">
                            <div type="button" class="menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-user'></i>
                                <div class="text">
                                    <span>Cliente</span>
                                    <i class='bx bx-chevron-down arrow'></i>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="view/pages/cliente.php">Exibir</a></li>
                                <li><a href="view/pages/cadastroCliente.php">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <div type="button" class="menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-cart'></i>
                                <div class="text">
                                    <span>Produto</span>
                                    <i class='bx bx-chevron-down arrow'></i>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="view/pages/produto.php">Exibir</a></li>
                                <li><a href="view/pages/cadastroProduto.php">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <div type="button" class="menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-package'></i>
                                <div class="text">
                                    <span>Estoque</span>
                                    <i class='bx bx-chevron-down arrow'></i>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="view/pages/estoque.php">Exibir</a></li>
                                <li><a href="view/pages/cadastroEstoque.php">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <div type="button" class="menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-collapse-alt'></i>
                                <div class="text">
                                    <span>Tamanho</span>
                                    <i class='bx bx-chevron-down arrow'></i>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="view/pages/tamanho.php">Exibir</a></li>
                                <li><a href="view/pages/cadastroTamanho.php">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <div type="button" class="menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-credit-card'></i>
                                <div class="text">
                                    <span>Venda</span>
                                    <i class='bx bx-chevron-down arrow'></i>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="view/pages/venda.php">Exibir</a></li>
                                <li><a href="view/pages/cadastroVenda.php">Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <div id="tema" class="container-tema">
                <div class="tema-mode">
                    <i class="bx bx-sun tema-claro"></i>
                    <i class="bx bx-moon tema-escuro"></i>
                </div>
                <div class="container-switch">
                    <span class="text-switch">Modo escuro</span>
                    <div class="toggle-switch">
                        <span id="switch" class="switch">
                    </div>
                </div>
            </div>
        </nav>
      	<main>
            <article id="">
                <section id="user">
                    <div class="container-user">
                        <i class='bx bxs-user-circle'></i>
                        <div class="user">
                            <span>Douglas junior</span>
                            <span class="type-user">ADMIN</span>
                        </div>
                    </div>
                </section>
                <section id="local">
                    <h3>Início / painel</h3>
                </section>
                <section id="information" class="information">
                    <h2>Informações gerais</h2>
                    <div class="container-information">
                        <div id="estoque" class="container-estoque">
                            <legend>Estoque total</legend>
                            <h2><?= $valorProduto?></h2>
                        </div>
                        <div id="venda" class="container-venda">
                            <legend>Venda total</legend>
                            <h2><?= $valorVenda?></h2>
                        </div>
                        <div id="cliente" class="container-cliente">
                            <legend>N° Clientes</legend>
                            <h2><?= $nClientes?></h2>
                        </div>
                        <div id="produto" class="container-produto">
                            <legend>N° Estoques</legend>
                            <h2><?= $nEstoques?></h2>
                        </div>
                    </section>
                    </div>
            </article>
            <article id="consult" class="consult">
                <section class="container-grafico">
                    <h2>Gráfico de vendas 2023</h2>
                    <canvas id="myChart"></canvas>
                </section>
                <aside class="container-notificacao">
                    <h2>
                        <span>Notificações</span>
                        <i>...</i>
                    </h2>
                    <div class="notificacao">
                        <p>
                            <i class='bx bx-bell'></i>
                            <span>Novos clientes cadastrados</span>
                        </p>
                        <legend>4 horas atrás</legend>
                    </div>
                    <div class="notificacao">
                        <p>
                            <i class='bx bx-bell'></i>
                            <span>Novos clientes cadastrados</span>
                        </p>
                        <legend>12 horas atrás</legend>
                    </div>
                    <div class="notificacao">
                        <p>
                            <i class='bx bx-bell'></i>
                            <span>Novos clientes cadastrados</span>
                        </p>
                        <legend>1 semana atrás</legend>
                    </div>
                    <div class="notificacao">
                        <p>
                            <i class='bx bx-bell'></i>
                            <span>Novos clientes cadastrados</span>
                        </p>
                        <legend>2 semanas atrás</legend>
                    </div>
                </aside>
            </article>
        </main>
        <footer>
            <p>Desenvolvido por <strong>Gustavo Sachetto</strong></p>
        </footer>
    </body>
</html>