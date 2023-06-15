<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_empresa'])) {
    die('Você não pode acessar esta página porque não está logado.<p><a href="login.php">Entrar</a></p>');
}

require("conn.php");

$idEmpresa = $_SESSION['id_empresa'];

// Consulta o nome do usuário com base no id_empresa
$sql = "SELECT nome FROM empresas WHERE id_empresa = '$idEmpresa'";
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
    // Obtém o nome do usuário
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $nome = $row['nome'];

    // Armazena o nome do usuário na variável de sessão
    $_SESSION['nome'] = $nome;
} else {
    // Caso o id_empresa não seja encontrado, você pode lidar com isso de acordo com a lógica do seu sistema
}
?>
