<?php
$includeNavbar = true;
if ($includeNavbar) {
    include("navbar.php"); // Inclui a navbar
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.5);
            padding: 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 4px;
            z-index: 9999;
            text-align: center;
            opacity: 3;
            animation: fadeOut 5s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }

        .success-popup {
            background-color: #c9f6d6;
            border-color: #5bc366;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            <?php
            session_start();
            if (isset($_SESSION['login_status'])) {
                if ($_SESSION['login_status'] === 'success') {
                    echo "showPopup('Bem-vindo!', 'success-popup');";
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
                }, 2000);
            }
        });
    </script>
</head>
<body>
</body>
</html>
