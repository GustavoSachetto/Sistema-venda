<nav class="sidebar close">
    <header>
        <div class="container-header">
            <span class="container-img">
                <img src="../img/logo.png" alt="logo">
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
                    <a class="menu-link" href="../../index.php">
                        <i class='bx bx-home-alt'></i>
                        <div class="text">
                            <span class="painel-link">Painel</span>
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
                        <li><a href="cliente.php">Exibir</a></li>
                        <li><a href="cadastroCliente.php">Cadastrar</a></li>
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
                        <li><a href="produto.php">Exibir</a></li>
                        <li><a href="cadastroProduto.php">Cadastrar</a></li>
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
                        <li><a href="estoque.php">Exibir</a></li>
                        <li><a href="cadastroEstoque.php">Cadastrar</a></li>
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
                        <li><a href="tamanho.php">Exibir</a></li>
                        <li><a href="cadastroTamanho.php">Cadastrar</a></li>
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
                        <li><a href="venda.php">Exibir</a></li>
                        <li><a href="cadastroVenda.php">Cadastrar</a></li>
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