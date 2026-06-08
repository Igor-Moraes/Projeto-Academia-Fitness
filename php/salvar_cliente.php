<?php

require 'security.php';
require 'conecta.php';

$sql = "
UPDATE cliente
SET
nome = :nome,
cpf = :cpf,
telefone = :telefone,
email = :email
WHERE id_cliente = :id_cliente
";

$stmt = $pdo->prepare($sql);

$stmt->execute([

'nome' => $_POST['nome'],
'cpf' => $_POST['cpf'],
'telefone' => $_POST['telefone'],
'email' => $_POST['email'],
'id_cliente' => $_POST['id_cliente']

]);

header("Location: clientes.php");
exit;
?>
