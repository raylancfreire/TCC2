<?php
require("conn.php");

// Obtém o ID atual
$id_atual = $_GET['comprar'];

// Consulta SQL para selecionar o produto com o ID atual
$sql = "SELECT * FROM produtos WHERE id_produto = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_atual]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto foi encontrado
if ($produto) {
    echo "<h2>{$produto['nome_produto']}</h2>";
    echo "<p>{$produto['descricao']}</p>";
    echo "<p>Marca: {$produto['marca']}</p>";
    echo "<p>Categoria: {$produto['categoria']}</p>";
    echo "<p>Preço: R$ {$produto['preco']}</p>";
    echo "<p>Quantidade: {$produto['quantidade_produto']}</p>";
    // Exibir a imagem aqui
    echo "<img src='upload/{$produto['path']}' alt='Imagem do produto'>";
} else {
    echo "Produto não encontrado.";
}

// Lembre-se de tratar exceções e fechar a conexão com o banco de dados quando terminar.
?>
