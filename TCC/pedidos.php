<?php
// Obtém os dados da compra do formulário
$idProduto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];
$valorTotal = $_POST['valor_total'];
$enderecoEntrega = $_POST['endereco_entrega'];

// Insere um novo registro na tabela "pedidos"
$sql = "INSERT INTO pedidos (id_usuario, id_produto, quantidade, valor_total, endereco_entrega, status_pedido)
        VALUES (:idUsuario, :idProduto, :quantidade, :valorTotal, :enderecoEntrega, 'Aguardando confirmação')";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idUsuario', $_SESSION['id_usuario']);
$stmt->bindParam(':idProduto', $idProduto);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':valorTotal', $valorTotal);
$stmt->bindParam(':enderecoEntrega', $enderecoEntrega);
$stmt->execute();

// Atualiza a tabela "produtos" para decrementar a quantidade disponível
$sql = "UPDATE produtos SET quantidade_produto = quantidade_produto - :quantidade WHERE id_produto = :idProduto";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':quantidade', $quantidade);
$stmt->bindParam(':idProduto', $idProduto);
$stmt->execute();

// Verifica se as operações foram bem-sucedidas
if ($stmt->rowCount() > 0) {
    // Exibe uma mensagem de sucesso
    echo "Pedido realizado com sucesso! Aguarde a confirmação da empresa.";
} else {
    // Exibe uma mensagem de erro
    echo "Erro ao realizar o pedido. Por favor, tente novamente mais tarde.";
}
?>
