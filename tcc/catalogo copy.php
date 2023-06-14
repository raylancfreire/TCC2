<!DOCTYPE html>
<html lang="pt-br">
<div class="container">
    <div class="row">
      <div class="col mt-5">   
      <div class="catalog">
      <div class="container">
        <div class="row">
        <div class="container">
        <div class="row">
  <body>
  <form method="GET" action="resultado_busca.php">
        <input type="text" name="nome_produto" placeholder="Digite o nome do produto">
        <input type="submit" value="Buscar">
    </form>
    <?php
    // Verifica se o parâmetro nome_produto foi enviado
    if (isset($_GET['nome_produto'])) {
        // Conecta ao banco de dados (substitua os valores pelos seus próprios)
        $servername = "localhost";
        $username = "seu_usuario";
        $password = "sua_senha";
        $dbname = "nome_do_banco_de_dados";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica se houve um erro na conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Escapa caracteres especiais para evitar injeção de SQL
        $search = mysqli_real_escape_string($conn, $_GET['nome_produto']);

        // Consulta no banco de dados
        $sql = "SELECT * FROM tabela_produtos WHERE nome LIKE '%$search%'";
        $result = $conn->query($sql);

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Exibe os resultados
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Nome: " . $row["nome"] . "<br>";
                echo "Descrição: " . $row["descricao"] . "<br><br>";
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>
  </body>
</html>

              <?php
              require("conn.php");

              // Consulta os dados da tabela "produtos"
              $sql = "SELECT path, nome_produto, descricao, preco FROM produtos";
              $result = $pdo->query($sql);

              // Exibe os produtos em forma de catálogo
              if ($result->rowCount() > 0) {
                echo "<div class='catalog'>"; // Início do catálogo

                foreach ($result as $row) {
                  // Exibe os detalhes do produto
                  echo "<div class='product'>";
                  echo "<img class='product-image' src='upload/{$row['path']}' alt='Imagem do produto'>";
                  echo "<h3 class='product-name'>{$row['nome_produto']}</h3>";
                  echo "<p class='product-description'>{$row['descricao']}</p>";
                  echo "<p class='product-price'>Preço: R$ {$row['preco']}</p>";
                  echo "<button class='botao-comprar'>Comprar</button>";
                  echo "</div>";
                }
            echo "</div>"; // Fim do catálogo
              } else {
                echo "<p>Nenhum produto encontrado.</p>";
              }

    ?>

              
