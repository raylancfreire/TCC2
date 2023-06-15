<?php
// Consulta os pedidos do usuário logado
$idUsuario = $_SESSION['id_usuario'];
$sql = "SELECT p.*, pr.nome_produto
        FROM pedidos p
        INNER JOIN produtos pr ON p.id_produto = pr.id_produto
        WHERE p.id_usuario = :idUsuario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Exibe os pedidos na página -->
<h2>Meus Pedidos</h2>
<?php foreach ($pedidos as $pedido): ?>
    <div>
        <p>Nome do Produto: <?php echo $pedido['nome_produto']; ?></p>
        <p>Quantidade: <?php echo $pedido['quantidade']; ?></p>
        <p>Valor Total: <?php echo $pedido['valor_total']; ?></p>
        <p>Endereço de Entrega: <?php echo $pedido['endereco_entrega']; ?></p>
        <p>Data do Pedido: <?php echo $pedido['data_pedido']; ?></p>
        <p>Status do Pedido: <?php echo $pedido['status_pedido']; ?></p>
    </div>
<?php endforeach; ?>
