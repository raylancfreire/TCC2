
<?php

    include("conn.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $empresas = $pdo->prepare('SELECT * FROM empresas where email=:email
    AND senha=:senha');
    $empresas->execute(array(':email'=>$email,':senha'=>$senha));

    $rowTabela = $empresas->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Usuario e/ou senha invalidos!!!');
        window.location.href='login.php';
        </script>";
    }else{
       
    $sessao = $rowTabela[0];

    if(!isset($_SESSION)) {
    session_start();
    }
    $_SESSION['id_empresa'] = $sessao['id_empresa'];
    $_SESSION['email'] = $sessao['email'];

    header("Location: teste.php");
    }

?>