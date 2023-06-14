<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Cadastro de Usuários</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center;">Cadastro de Usuários</h1>
        <br>
        <form action="" method="post" id="formulario">
            <label for="">Nome:</label>
            <input type="text" name="nome_usuario" id="" class="">

            <label for="">CPF:</label>
            <input type="text" name="cpf" id="cpf" maxlength="14" class="">

            <label for="">Email:</label>
            <input type="email" name="email" id="" class="">

            <label for="">Senha:</label>
            <input type="password" name="senha_hash" id="" class="">

            <br>

            <input type="submit" class="btn btn-success" value="CADASTRAR USUÁRIO">
        </form>
        <div id="resultado"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        // Função para formatar o CPF com pontos e traço
        function formatarCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os primeiros três dígitos
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os segundos três dígitos
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona um traço antes dos dois últimos dígitos
            return cpf;
        }

        // Formata o CPF enquanto o usuário digita e limita a 14 dígitos
        $('#cpf').on('input', function() {
            var cpf = $(this).val();
            cpf = formatarCPF(cpf);
            $(this).val(cpf);

            // Limita o campo a 14 dígitos
            if ($(this).val().length > 14) {
                $(this).val($(this).val().slice(0, 14));
            }
        });

        $("#formulario").submit(function(event) {
            event.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'CRUD/cad_usuario.php',
                data: dados,
                success: function(data) {
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>

</html>
