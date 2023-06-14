<?php
require('../conn.php');

$nome_usuario = $_POST['nome_usuario'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha_hash'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

if (empty($nome_usuario) || empty($cpf) || empty($email) || empty($senha_hash)) {
    echo "Os valores não podem ser vazios";
} elseif (!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $cpf)) {
    echo "CPF inválido. Por favor, insira um CPF válido no formato xxx.xxx.xxx-xx.";
} else {
    $cad_usuarios = $pdo->prepare("INSERT INTO usuarios(nome_usuario, cpf, email, senha_hash) 
        VALUES(:nome_usuario, :cpf, :email, :senha_hash)");
    $cad_usuarios->execute(array(
        ':nome_usuario' => $nome_usuario,
        ':cpf' => $cpf,
        ':email' => $email,
        ':senha_hash' => $senha_hash
    ));

    echo "<script>
        alert('Usuário cadastrado com sucesso!');
        </script>";
}
?>
