<?php
// Configurações do banco de dados
$host = 'localhost';
$dbName = 'tcc';
$username = 'root';
$password = '';

// Função para validar o formato de um CNPJ
function validarCNPJ($cnpj) {
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    // Verifica se o CNPJ possui 14 dígitos
    if (strlen($cnpj) !== 14) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (ex: 00000000000000)
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Validação do primeiro dígito verificador
    $soma = 0;
    for ($i = 0, $j = 5; $i < 12; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j === 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
        return false;
    }

    // Validação do segundo dígito verificador
    $soma = 0;
    for ($i = 0, $j = 6; $i < 13; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j === 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

// Função para validar o formato de um email
function validarEmail($email) {
    // Verifica se o email possui um formato válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    // Verifica o domínio do email
    $domain = explode('@', $email)[1];
    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }

    return true;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validação dos campos
    $errors = [];
    if (empty($nome)) {
        $errors[] = 'O campo "Nome" é obrigatório.';
    }
    if (empty($endereco)) {
        $errors[] = 'O campo "Endereço" é obrigatório.';
    }
    if (empty($telefone)) {
        $errors[] = 'O campo "Telefone" é obrigatório.';
    }
    if (empty($cnpj)) {
        $errors[] = 'O campo "CNPJ" é obrigatório.';
    } elseif (!validarCNPJ($cnpj)) {
        $errors[] = 'O campo "CNPJ" está em um formato inválido.';
    }
    if (empty($email)) {
        $errors[] = 'O campo "E-mail" é obrigatório.';
    } elseif (!validarEmail($email)) {
        $errors[] = 'O campo "E-mail" está em um formato inválido.';
    }
    if (empty($senha)) {
        $errors[] = 'O campo "Senha" é obrigatório.';
    }

    // Se não houver erros, realiza o cadastro da loja
    if (empty($errors)) {
        try {
            // Conexão com o banco de dados
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Verifica se já existe um registro com os mesmos valores de telefone, cnpj e email
            $stmt = $conn->prepare('SELECT * FROM empresas WHERE telefone = :telefone OR cnpj = :cnpj OR email = :email');
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':cnpj', $cnpj);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $errors[] = 'Já existe uma loja cadastrada com algum dado que você informou.';
            } else {
                // Prepara a consulta SQL
                $stmt = $conn->prepare('INSERT INTO empresas (nome, endereco, telefone, cnpj, email, senha) VALUES (:nome, :endereco, :telefone, :cnpj, :email, :senha)');
    
                // Executa a consulta
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':endereco', $endereco);
                $stmt->bindValue(':telefone', $telefone);
                $stmt->bindValue(':cnpj', $cnpj);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':senha', $senha);
    
                if ($stmt->execute()) {
                    echo "<script>
                        alert('Loja cadastrada com sucesso!!!');
                        window.location.href='login.php';
                    </script>";
                } else {
                    echo 'Erro ao executar a consulta SQL.';
                }
            }
        } catch (PDOException $e) {
            echo 'Erro ao cadastrar a loja: ' . $e->getMessage();
        }}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Loja</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
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