
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Loja</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<form action="CRUD/cad_empresa.php" method="post" enctype="multipart/form-data">
    <h1>Cadastro de Loja</h1>

    <?php if (!empty($errors)) { ?>
        <script>
            window.onload = function() {
                alert('<?php echo implode("\n", $errors); ?>');
            }
        </script>
    <?php } ?>

    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" maxlength = "16" required>
        <br>
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" maxlength="40" required>
        <br>
        <input type="submit" value="Cadastrar">
        
    </form>
    <script>
        $(document).ready(function() {
            $('#telefone').on('input', function() {
                var telefone = $(this).val();
                telefone = telefone.replace(/\D/g, '');
                telefone = telefone.replace(/(\d{2})(\d{1})(\d{1,4})(\d{1,4})$/, '($1) $2 $3-$4');
                $(this).val(telefone);
            });
        });
    </script>
</body>
</html>