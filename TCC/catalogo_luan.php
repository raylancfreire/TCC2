<?php
session_start();
$includeNavbar = true;
if ($includeNavbar) {
  include("navbar.php"); // Inclui a navbar
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="catalogo.css">
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

  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <!-- Conteúdo do catálogo -->
        <div class="catalog">
          <div class="row">
            <?php
            require("conn.php");

            if (isset($_GET['nome_produto'])) {
              $nomeProduto = $_GET['nome_produto'];

              // Consulta os dados da tabela "produtos" com base no nome do produto
              $sql = "SELECT path, nome_produto, descricao, preco FROM produtos WHERE nome_produto LIKE '%$nomeProduto%'";
              $result = $pdo->query($sql);

              // Exibe os produtos em forma de catálogo
              if ($result->rowCount() > 0) {
                foreach ($result as $row) {
                  echo "<div class='product'>";
                  echo "<img class='product-image' src='upload/{$row['path']}' alt='Imagem'>";
                  echo "<h3 class='product-name'>{$row['nome_produto']}</h3>";
                  echo "<p class='product-description'>{$row['descricao']}</p>";
                  echo "<p class='product-price'>Preço: R$ {$row['preco']}</p>";
                  echo "<button class='botao-comprar'>Comprar</button>";
                  echo "</div>";
                }
              } else {
                echo "<p>Nenhum produto encontrado.</p>";
              }
            }

            // Consulta os dados da tabela "produtos"
            $sql = "SELECT id_produto, path, quantidade_produto, nome_produto, descricao, preco FROM produtos";
            $result = $pdo->query($sql);

            // Exibe os produtos em forma de catálogo
            if ($result->rowCount() > 0) {
              foreach ($result as $row) {
                echo '<div class="col-md-3 mb-4">'; // Colunas com tamanho "col-md-3"
                echo '<div class="product">';
                echo '<img class="product-image" src="upload/' . $row['path'] . '" alt="Imagem do produto">';
                echo '<h3 class="product-name">' . $row['nome_produto'] . '</h3>';
                echo '<p class="product-description">' . $row['descricao'] . '</p>';
                echo '<p class="product-price">Preço: R$ ' . $row['preco'] . '</p>';
                echo '<a href="tela_compra.php?comprar=' . $row['id_produto'] . '" class="btn-verde">COMPRAR</a>';
                echo '<br>';
                echo '<a href="#" class="btn-azul add-to-cart" data-produto="' . $row['id_produto'] . '" ">ADICIONAR AO CARRINHO</a>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo '<div class="col">';
              echo '<p>Nenhum produto encontrado.</p>';
              echo '</div>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  
  <script>
    
    // Captura o evento de clique no botão "ADICIONAR AO CARRINHO"
    document.addEventListener('click', function(event) {
      // Verifica se o botão clicado possui a classe "add-to-cart"
      if (event.target.classList.contains('add-to-cart')) {
        event.preventDefault(); // Impede o comportamento padrão de redirecionamento do link

        // Obtém o valor do atributo "data-produto" do botão clicado
        var produtoId = event.target.getAttribute('data-produto');

        // Envia o parâmetro para o script de manipulação do carrinho (carrinho.php) usando AJAX
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            alert('Produto enviado ao carrinho com sucesso');
          }
        };
        xhttp.open('GET', 'carrinho.php?carrinho=' + produtoId, true);
        xhttp.send();
      }
    });
  </script>
</body>

</html>
