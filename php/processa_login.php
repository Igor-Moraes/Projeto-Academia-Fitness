<?php

session_start();
require 'conecta.php';

$message = '';
$messageClass = '';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM credenciais
        WHERE email = :email";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $senha == $usuario['senha']) {

    // CLIENTE
    if ($usuario['id_cliente'] != NULL) {

        $sqlCliente = "SELECT * FROM cliente
                       WHERE id_cliente = :id";

        $stmtCliente = $pdo->prepare($sqlCliente);
        $stmtCliente->bindValue(':id', $usuario['id_cliente']);
        $stmtCliente->execute();

        $cliente = $stmtCliente->fetch(PDO::FETCH_ASSOC);

        $_SESSION['cliente_id'] = $cliente['id_cliente'];
        $_SESSION['cliente_nome'] = $cliente['nome'];

        header("Location: admin.php");
        exit;
    }

    // FUNCIONÁRIO
    if ($usuario['id_funcionario'] != NULL) {

        $sqlFuncionario = "SELECT * FROM funcionário
                           WHERE id_funcionario = :id";

        $stmtFuncionario = $pdo->prepare($sqlFuncionario);
        $stmtFuncionario->bindValue(':id', $usuario['id_funcionario']);
        $stmtFuncionario->execute();

        $funcionario = $stmtFuncionario->fetch(PDO::FETCH_ASSOC);

        $_SESSION['funcionario_id'] = $funcionario['id_funcionario'];
        $_SESSION['funcionario_nome'] = $funcionario['nome'];

        header("Location: funcionario.php");
        exit;
    }

} else {

    $message = 'E-mail ou senha inválidos.';
    $messageClass = 'message-error';

}

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
    <?php if (!empty($message)): ?>
        <div class="message-container <?= $messageClass ?>">
            <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>
</body>
<script>
    setTimeout(function() {
        window.location.href = '../php/login.php';
    }, 5000);
</script>