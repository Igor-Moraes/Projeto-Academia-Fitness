<?php

session_start();
require 'conecta.php';

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

    echo "E-mail ou senha inválidos.";

}

?>