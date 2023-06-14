<!DOCTYPE html>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/navbar.css">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #b7d6f5;">
<div class="container-fluid">
        <img src="LOGO2.png" ahref="login.php">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="?page=catalogo">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=pedidos">Meus Pedidos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadprod"> Cadastrar Produto</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            </ul>
          </li>
        </ul>
        <div class="container">
          <div class="d-flex justify-content-end ms-auto" style="margin-top: 22px;">
            <p id="endereco">Rua Exemplo, 123 - Cidade</p>
            <button class="btn btn-outline-primary" onclick="alterarEndereco()">Alterar Endereço</button>
          </div>
        </div>
      </div>
    </div>  
  </nav>
</body>
</html>
  <?php
    switch(@$_REQUEST["page"]){
      case "catalogo":
    include("catalogo.php");
      break;
    case"cadprod":
      include("cadastrar_produto.php");
    break;
    case"index":
        include("index.php");
      break;
    default:
    }
    ?>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>