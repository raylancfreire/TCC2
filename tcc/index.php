<?php
    $includeNavbar = true;
    if ($includeNavbar) {
        include("navbar.php");
    }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
<body>
  <?php if (isset($_SESSION['email'])) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Bem-vindo!',
          text: 'Olá, <?php echo $_SESSION['email']; ?>. Bem-vindo de volta!',
          icon: 'success',
          confirmButtonText: 'OK'
        });
      });
    </script>
  <?php } ?>
  
  <!-- Resto do seu código HTML -->
</body>

