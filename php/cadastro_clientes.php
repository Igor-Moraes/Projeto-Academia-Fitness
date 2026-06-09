<?php
    require 'conecta.php';
    require 'security_cadastro.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="favicon-64x64.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="512x512" href="favicon-512x512.png">
    <link rel="icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processamento de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #050507 0%, #E50914 100%);
        }

        .message-container {
            padding: 20px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.5s ease-in-out, slideOut 0.5s ease-in-out 4.5s forwards;
            max-width: 500px;
        }

        .message-success {
            background-color: #050507;
            color: #4CAF50;
        }

        .message-error {
            background-color: #050507;
            color: #f44336;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-30px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>

<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $modalidade = $_POST['modalidade'];
    $cpf= $_POST['cpf'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $senha = $_POST['senha'];

try {

    $pdo->beginTransaction();

    // ENDEREÇO
    $sqlEndereco = "INSERT INTO endereco
    (rua, bairro, cep, cidade, estado, numero_casa, complemento)
    VALUES
    (:rua, :bairro, :cep, :cidade, :estado, :numero_casa, :complemento)";

    $stmtEndereco = $pdo->prepare($sqlEndereco);

    $stmtEndereco->execute([
        ':rua' => $rua,
        ':bairro' => $bairro,
        ':cep' => $cep,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':numero_casa' => $numero,
        ':complemento' => $complemento
    ]);

    $id_endereco = $pdo->lastInsertId();

    // CLIENTE
    $sqlCliente = "INSERT INTO cliente
    (nome, email, telefone, modalidade, cpf, genero, data_nascimento, id_endereco)
    VALUES
    (:nome, :email, :telefone, :modalidade, :cpf, :genero, :data_nascimento, :id_endereco)";

    $stmtCliente = $pdo->prepare($sqlCliente);

    $stmtCliente->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':modalidade' => $modalidade,
        ':cpf' => $cpf,
        ':genero' => $genero,
        ':data_nascimento' => $data_nascimento,
        ':id_endereco' => $id_endereco
    ]);

    $id_cliente = $pdo->lastInsertId();

    // CREDENCIAIS
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCredenciais = "INSERT INTO credenciais
    (email, senha, id_cliente)
    VALUES
    (:email, :senha, :id_cliente)";

    $stmtCredenciais = $pdo->prepare($sqlCredenciais);

    $stmtCredenciais->execute([
        ':email' => $email,
        ':senha' => $senhaHash,
        ':id_cliente' => $id_cliente
    ]);

    $pdo->commit();

    echo '<div class="message-container message-success">✓ Cliente cadastrado com sucesso!</div>';

} catch (PDOException $e) {

    $pdo->rollBack();

    echo '<div class="message-container message-error">✗ Erro ao cadastrar cliente: ' . $e->getMessage() . '</div>';
}
?>

<script>
    setTimeout(function() {
        window.location.href = '../php/login.php';
    }, 5000);
</script>

</body>
</html>


