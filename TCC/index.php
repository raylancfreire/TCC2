<!doctype html>
<html lang="pt-br">
  <head>
    <script>
        function alterarEndereco() {
        var novoEndereco = prompt("Digite o novo endereço:");
        if (novoEndereco) {
            document.getElementById("endereco").textContent = novoEndereco;
        }
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ExpCars</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=catalogo">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=ofertas">Ofertas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="?page=pedidos">Meus Pedidos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sair</a></li>
          </ul>
        </li>
            <div class="container">
        <div class="d-flex justify-content-end ms-auto">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <p id="endereco">Rua Exemplo, 123 - Cidade</p>
        <button class="btn btn-outline-primary" onclick="alterarEndereco()">Alterar Endereço</button>
        </div>
     </div>
    </div>
    </nav>  
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                    switch(@$_REQUEST["page"]){
                        case "catalogo":
                            include("catalogo.php");
                        break;
                        case"ofertas":
                            include("ofertas.php");
                        break;
                        case "perfil":
                            include("perfil.php");
                        break;
                        case"pedidos":
                            include("pedidos.php");
                        break;
                        default:
                            print "<h1>bem vindo!</h1>";
                    }
                ?>  
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
