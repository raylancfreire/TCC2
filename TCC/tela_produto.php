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
echo "<div class='product-details'>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<img class='imagem' src='upload/{$row['path']}' alt='Product image'>";
echo "</div>";
echo "<div class='col-md-6'>";
echo "<h3 class='product-name'>{$row['nome_produto']}</h3>";
echo "<p class='product-price'>R$ {$row['preco']}</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<p class='product-description'>{$row['descricao']}</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<button class='botao'>Comprar</button>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
<style>
    .product-details {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.imagem {
    position: fixed;
    width: 1000px;
    left: 40px;
    margin-top: 50px;
}

.product-name {
    position:absolute;
    font-size: 180px;
    font-weight: bold;
    margin-top: 20px;
    left: 45%;
}

.product-price {
    position: absolute;
    font-size: 50px;
    color: #f60;
    left: 45%;
    margin-top: 420px;
}

.product-description {
    position:absolute;
    font-size: 80px;

    margin-top: 200px;
    left: 45%;
}

.botao{
    position: relative;
    background-color: greenyellow;
    width: 400px;
    left: 35%;
    margin-top: 500px;
    height: 100px;
    border-radius: 10px;
    cursor: pointer;
    
}

</style>
