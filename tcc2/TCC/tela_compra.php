<?php
require("conn.php");

// Get the ID from the URL parameter
$comprar = $_GET['comprar'];

// Query the data for the given ID
$sql = "SELECT id_produto, path, nome_produto, descricao, preco FROM produtos WHERE id_produto = :comprar";
$stmt = $pdo->prepare($sql);
$stmt->execute(['comprar' => $comprar]);
$row = $stmt->fetch();

// Display the product details
?>

<div class='product-details'>
  <div class='row'>
    <div class='col-md-6'>
      <div class='image-container'>
        <img class='imagem' src='upload/<?php echo $row['path']; ?>' alt='Product image'>
      </div>
    </div>
    <div class='col-md-6'>
      <div class="letras">
      <p type="text" name='id_produto'> <?php echo $row['id_produto']; ?></p>

        <h3 class='product-name'><?php echo $row['nome_produto']; ?></h3>
        <p class='product-price'>R$ <?php echo $row['preco']; ?></p>
        <p class='product-description'><?php echo $row['descricao']; ?></p>
        <a href="carrinho.php?comprar=<?php echo $row['id_produto']; ?>" class="btn btn-success">COMPRAR</a>

        

      </div>
    </div>
  </div>
</div>

<style>
.product-details {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  margin-top: 20px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;
  margin-bottom: 10px;
}

.col-md-6 {
  flex-basis: 50%;
  max-width: 50%;
  padding: 10px;
}

.image-container {
  width: 100%;
  max-width: 300px;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.imagem {
  max-width: 500px;
  max-height: 500px;
}

.product-name {
  font-size: 24px;
  margin-top: 10px;
}

.product-price {
  font-size: 18px;
  margin-top: 5px;
}

.product-description {
  margin-top: 10px;
}

.botao {
  padding: 10px 20px;
  font-size: 18px;
  background-color: #228B22;
  color: #fff;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-decoration: none;
}
</style>
