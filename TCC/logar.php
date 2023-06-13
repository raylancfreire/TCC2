<?php
    include("conn.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios = $pdo->prepare('SELECT * FROM usuarios where email=:email
    AND senha_hash=:senha');
    $usuarios->execute(array(':email'=>$email,':senha_hash'=>$senha));

    $rowTabela = $usuarios->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Usuario e/ou senha invalidos!!!');
        </script>";
    }else{
       
    $sessao = $rowTabela[0];

    if(!isset($_SESSION)) {
    session_start();
    }
    $_SESSION['id_usuarios'] = $sessao['id_usuarios'];
    $_SESSION['email'] = $sessao['email'];

    header("Location: tabela.php");
    }

?>