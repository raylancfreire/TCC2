<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="CRUD/cad_produto.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome_produto" placeholder="Nome do Produto" required><br>
        <input type="text" name="descricao" placeholder="Descrição" required><br>
        <input type="text" name="marca" placeholder="Marca" required><br>
        <input type="text" name="categoria" placeholder="Categoria" required><br>
        <input type="number" name="preco" placeholder="Preço" step="0.01" required><br>
        <input type="number" name="quantidade_produto" placeholder="Quantidade do Produto" required><br>
        <input type="file" name="imagem" required><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>