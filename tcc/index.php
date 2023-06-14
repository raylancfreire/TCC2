<?php
    $includeNavbar = true;
    if ($includeNavbar) {
        include("navbar.php"); // Inclui a navbar
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="catalog">
                    <form method="GET" action="resultado_busca.php">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nome_produto" placeholder="Digite o nome do produto">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>
