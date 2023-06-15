<?php
$includeNavbar = true;
if ($includeNavbar) {
    include("navbar.php"); // Inclui a navbar
}
require("conn.php");

// Verifique se a sessão está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Recupere o nome da empresa da sessão
$empresa = $_SESSION['nome'];

// Realize a consulta SQL unindo as tabelas "produtos" e "empresas" com base no campo "empresa"
$sql = "SELECT produtos.* FROM produtos INNER JOIN empresas ON produtos.empresa = empresas.nome WHERE empresas.nome = :empresa";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':empresa', $empresa);
$stmt->execute();

// Obtenha os resultados da consulta
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="catalogo.css">
</head>
<body>
<div class="container">
    <h1>Produtos da Empresa <?php echo $empresa; ?></h1>
    <?php foreach ($resultados as $produto) : ?>
        <div>
    <a href="tela_produto.php?comprar=<?php echo $produto['id_produto']; ?>">
        <img class="product-image" src="upload/<?php echo $produto['path']; ?>" alt="Imagem do produto">
    </a>
    <h2><?php echo $produto['nome_produto']; ?></h2>
    <p><?php echo $produto['descricao']; ?></p>
    <p><?php echo $produto['marca']; ?></p>
    <p><?php echo $produto['preco']; ?></p>
    <!-- Outras informações do produto -->
</div>
    <?php endforeach; ?>
</div>
    
</body>
</html>

