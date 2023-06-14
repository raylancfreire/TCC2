<?php
$includeNavbar = true;
if ($includeNavbar) {
  include("navbar.php"); // Inclui a navbar
}
?>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="catalogo.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carrinho de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>

<body>


  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <!-- Conteúdo do catálogo -->
        <div class="catalog">
          <div class="row">
            <?php
           // Inicia a sessão

            require("conn.php");

            // Função para adicionar um produto ao carrinho
            function adicionarAoCarrinho($id_produto, $quantidade, $nome_produto, $preco)
            {
              // Verifica se o carrinho já existe na sessão
              if (isset($_SESSION['carrinho'])) {
                $carrinho = $_SESSION['carrinho'];
              } else {
                $carrinho = array();
              }
              // Verifica se o produto já está no carrinho
              if (isset($carrinho[$id_produto])) {
                // Atualiza a quantidade do produto
                $carrinho[$id_produto]['quantidade'] += $quantidade;
              } else {
                // Adiciona o produto ao carrinho
                $carrinho[$id_produto] = array(
                  'id_produto'=>$id_produto,
                  'quantidade' => $quantidade,
                  'nome_produto' => $nome_produto,
                  'preco' => $preco
                );
              }

              // Atualiza o carrinho na sessão
              $_SESSION['carrinho'] = $carrinho;
            }

            // Verifica se foi solicitada a adição ao carrinho
            if (isset($_GET['carrinho'])) {
              $id_produto = (int)$_GET['carrinho'];

              // Consulta os dados do produto
              $sql = "SELECT id_produto, nome_produto, preco FROM produtos WHERE id_produto = :id_produto";
              $stmt = $pdo->prepare($sql);
              $stmt->bindValue(':id_produto', $id_produto);
              $stmt->execute();

              $produto = $stmt->fetch(PDO::FETCH_ASSOC);

              // Verifica se o produto existe
              if ($produto) {
                $quantidade = 1; // Quantidade padrão ao adicionar ao carrinho
                adicionarAoCarrinho($id_produto, $quantidade, $produto['nome_produto'], $produto['preco']);
                echo "O produto foi adicionado ao carrinho";
              } else {
                echo 'Produto não encontrado.';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h2>Carrinho de Compras</h2>
        <?php
        // Verifica se o carrinho está vazio
        if (!empty($_SESSION['carrinho'])) {
          echo '<table class="table">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>Nome do Produto</th>';
          echo '<th>Preço</th>';
          echo '<th>Quantidade</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          foreach ($_SESSION['carrinho'] as $id_produto => $item) {
            echo '<tr>';
          
             '<td>' . $item['id_produto'] . '</td>';
            echo '<td>' . $item['nome_produto'] . '</td>';
            echo '<td>R$ ' . $item['preco'] . '</td>';
            echo '<td>' . $item['quantidade'] . '</td>';
            echo '<td><a href=CRUD\realizar_emprestimo.php?emprestimo='.$item['id_produto'].' class="btn btn-primary">REALIZAR EMPRESTIMO</a></td>';
            echo '</tr>';
          }
          echo '</tbody>';
          echo '</table>';
          // Calcula o total da compra
          $total = 0;
          foreach ($_SESSION['carrinho'] as $id_produto => $item) {
            $total += $item['preco'] * $item['quantidade'];
          }
          echo '<p>Total: R$ ' . $total . '</p>';
        } else {
          echo '<p>O carrinho está vazio.</p>';
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>