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
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: 'Usuário e/ou senha inválidos!!!',
            confirmButtonText: 'OK',
            onClose: function() {
                history.back();
            }
        }).then(function() {
            history.back();
        });
        </script>";
    }else {
        $sessao = $rowTabela[0];
    
        if(!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id_login'] = $sessao['id_login'];
        $_SESSION['login'] = $sessao['login'];
    
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Bem-vindo!',
            text: 'Login bem-sucedido! Bem-vindo, " . $_SESSION['login'] . "!',
            confirmButtonText: 'OK',
            onClose: function() {
                window.location.href = 'index.php';
            }
        }).then(function() {
            window.location.href = 'index.php';
        });
        </script>";
        }

?>
