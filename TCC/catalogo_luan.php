<?php
    $includeNavbar = true;
    if ($includeNavbar) {
        include("navbar.php"); // Inclui a navbar
    }
    ?>
<html lang="pt-br">
<head>
  <link rel="stylesheet" href="CSS/catalogo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                    <form method="GET" action="catalogo.php">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nome_produto" placeholder="Digite o nome do produto">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</body>
</html>

<div class="container">
    <div class="row">
      <div class="col mt-5">
        <!-- Conteúdo do catálogo -->
        <div class="catalog">
          <h1>Catálogo</h1>
              <?php
              require("conn.php");

              // Consulta os dados da tabela "produtos"
              $sql = "SELECT path, nome_produto, descricao, preco FROM produtos";
              $result = $pdo->query($sql);

              // Exibe os produtos em forma de catálogo
              if ($result->rowCount() > 0) {
                echo "<div class='catalog'>"; // Início do catálogo

                foreach ($result as $row) {
                  // Exibe os detalhes do produto
                  echo "<div class='product'>";
                  echo "<img class='product-image' src='upload/{$row['path']}' alt='Imagem do produto'>";
                  echo "<h3 class='product-name'>{$row['nome_produto']}</h3>";
                  echo "<p class='product-description'>{$row['descricao']}</p>";
                  echo "<p class='product-price'>Preço: R$ {$row['preco']}</p>";
                  echo "<button class='botao-comprar'>Comprar</button>";
                  echo '<button><a href=tela_compra.php?produto='.['id_produto'].' class="btn btn-success">COMPRAR</a></button>';
                  echo "</div>";
                }

                echo "</div>"; // Fim do catálogo
              } else {
                echo "<p>Nenhum produto encontrado.</p>";
              }
              ?>

        </div>
      </div>
    </div>
  </div>