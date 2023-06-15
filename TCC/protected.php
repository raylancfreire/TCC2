<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['id_empresa'])) {
    die('Você não pode acessar esta página porque não está logado.<p><a href="login.php">Entrar</a></p>');
}

if (isset($_SESSION['id_empresa'])) {
    // O usuário é uma empresa
    $tipoUsuario = 'empresa';
} else {
    // O usuário é um usuário normal
    $tipoUsuario = 'usuario';
}

?>
