<?php

require 'security.php';
require 'conecta.php';

$id_cliente = $_GET['id'];

$stmt = $pdo->prepare("
DELETE FROM acesso
WHERE id_cliente = :id
");

$stmt->execute([
'id' => $id_cliente
]);

$stmt = $pdo->prepare("
DELETE FROM credenciais
WHERE id_cliente = :id
");

$stmt->execute([
'id' => $id_cliente
]);

$stmt = $pdo->prepare("
DELETE FROM cliente
WHERE id_cliente = :id
");

$stmt->execute([
'id' => $id_cliente
]);

header("Location: clientes.php");
exit;
?>
