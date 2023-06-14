<?php
require("protected.php");
require("conn.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/navbar.css">
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #b7d6f5;">
<div class="container-fluid">
        <img src="LOGO2.png" ahref="login.php" class="logo" >
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="catalogo.php" style="margin-right: 70px; border: 1.5px solid black; border-radius: 5px;" >Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pedidos.php" style="margin-right: 70px; width: 190px; border: 1.5px solid black; border-radius: 5px;">Meus Pedidos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style= "border: 1.5px solid black; border-radius: 5px;" >
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="cadastrar_produto.php"> Cadastrar Produto</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php">Sair</a></li>
            </ul>
          </li>
        </ul>
        <div class="container">
          <div class="d-flex justify-content-end ms-auto" style="margin-top: 22px;">
                <p id="endereco"><?php echo $_SESSION['endereco']; ?></p>
              <li class="nav-link dropdown">
              <a class="nav-link dropdown-toggle" href="navbar.php" role="button" aria-expanded="false">
            </a>
            </li>
          </div>
        </div>
      </div>
    </div>  
  </nav>
  
</body>
</html>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
