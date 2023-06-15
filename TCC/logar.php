<?php
include("conn.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuarios = $pdo->prepare('SELECT * FROM usuarios where email=:email AND senha=:senha');
$usuarios->execute(array(':email' => $email, ':senha' => $senha));

$rowTabela = $usuarios->fetchAll();

if (!empty($rowTabela)) {
    $sessao = $rowTabela[0];

    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['id_usuario'] = $sessao['id_usuario'];
    $_SESSION['email'] = $sessao['email'];
    $_SESSION['endereco'] = $sessao['endereco'];

    header("Location: catalogo.php");
    exit(); // Termina o script para evitar redirecionamentos duplicados
}

$empresas = $pdo->prepare('SELECT * FROM empresas where email=:email AND senha=:senha');
$empresas->execute(array(':email' => $email, ':senha' => $senha));

$rowTabela = $empresas->fetchAll();

if (!empty($rowTabela)) {
    $sessao = $rowTabela[0];

    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['id_empresa'] = $sessao['id_empresa'];
    $_SESSION['email'] = $sessao['email'];
    $_SESSION['telefone'] = $sessao['telefone'];

    header("Location: tela_inicial_empresa.php");
    exit(); // Termina o script para evitar redirecionamentos duplicados
}

// Se nenhum usuário válido for encontrado, exiba uma mensagem de erro e redirecione para a página de login
echo "<script>
        alert('Usuário e/ou senha inválidos!');
        window.location.href='login.php';
        </script>";
?>
