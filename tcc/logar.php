<?php
    include("conn.php");
    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = $pdo->prepare('SELECT * FROM usuarios where email=:email
    AND senha=:senha');
    $usuarios->execute(array(':email'=>$email,':senha'=>$senha));

    $rowTabela = $usuarios->fetchAll();
    
    if (empty($rowTabela)) {
        $_SESSION['login_status'] = 'error';
        header("Location: login.php");
    } else {
        $sessao = $rowTabela[0];
        // Armazene outras informações de sessão que você deseja exibir
        $_SESSION['id_usuario'] = $sessao['id_usuario'];
        $_SESSION['email'] = $sessao['email'];
        $_SESSION['endereco'] = $sessao['endereco'];
        $_SESSION['login_status'] = 'success';
        header("Location: index.php");
    }
?>
