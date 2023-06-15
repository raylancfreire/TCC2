<?php
    $includeNavbar = true;
    if ($includeNavbar) {
        include("navbar.php"); // Inclui a navbar
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php
            session_start();
            if (isset($_SESSION['login_status'])) {
                if ($_SESSION['login_status'] === 'success') {
                    $nome_usuario = $_SESSION['nome_usuario'];
                    echo "showPopup('Bem-vindo, $nome_usuario!', 'success-popup');";
                } elseif ($_SESSION['login_status'] === 'error') {
                    echo "showPopup('Usuário e/ou senha inválidos!', '');";
                }
                unset($_SESSION['login_status']);
            }
            ?>

            function showPopup(message, styleClass) {
                var popup = $('<div></div>').addClass('popup').addClass(styleClass);
                var popupMessage = $('<p></p>').text(message);

                popup.append(popupMessage);

                $('body').append(popup);

                setTimeout(function() {
                    popup.addClass('fadeOut');
                    setTimeout(function() {
                        popup.remove();
                    }, 1000);
                }, 8000);
            }
        });
    </script>
</head>
<body>
</body>
</html>
