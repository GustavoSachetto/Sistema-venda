<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        
        <link rel="stylesheet" href="view/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    </head>
    <body>
    <header>
    <h1>Sistema - venda</h1>
	<nav>
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a href="index.php" role="button" class="btn btn-secondary btn-lg">Inicio</a>
            <a href="view/pages/sobre.php" role="button" class="btn btn-secondary btn-lg">Sobre</a>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Cliente
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Exibir clientes</a></li>
                <li><a class="dropdown-item" href="view/pages/cadastroCliente.php">Cadastrar clientes</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Tamanho
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Exibir Tamanhos</a></li>
                <li><a class="dropdown-item" href="view/pages/cadastroTamanho.php">Cadastrar Tamanhos</a></li>
                </ul>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Produto
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Exibir Produtos</a></li>
                <li><a class="dropdown-item" href="view/pages/cadastroProduto.php">Cadastrar Produtos</a></li>
                </ul>
            </div>
        </div>
	</nav>
</header>
      	<main></main>
        <footer>
            <p>Desenvolvido por <strong>Gustavo Sachetto</strong></p>
        </footer>
    </body>
</html>