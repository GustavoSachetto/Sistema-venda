<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        
        <link rel="shortcut icon" href="view/img/logo.png" type="image/x-icon">        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="view/css/style.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="view/js/script.js"></script>
    </head>
    <body>
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
            <article>
                
            </article>
        </main>
        <footer>
            <p>Desenvolvido por <strong>Gustavo Sachetto</strong></p>
        </footer>
    </body>
</html>