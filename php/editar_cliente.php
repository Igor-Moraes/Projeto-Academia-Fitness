<?php

require 'security.php';
require 'conecta.php';

$id = $_GET['id'];

$sql = "SELECT cliente.*, endereco.*
        FROM cliente
        INNER JOIN endereco
        ON cliente.id_endereco = endereco.id_endereco
        WHERE cliente.id_cliente = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$id]);

$cliente = $stmt->fetch();

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Editar Cliente</title>
</head>

<body>

<h1>Editar Cliente</h1>

<form action="salvar_cliente.php" method="POST">

<input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">
<input type="hidden" name="id_endereco" value="<?= $cliente['id_endereco'] ?>">

Nome:<br> <input type="text" name="nome" value="<?= $cliente['nome'] ?>"><br><br>

CPF:<br> <input type="text" name="cpf" value="<?= $cliente['cpf'] ?>"><br><br>

Telefone:<br> <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>"><br><br>

Email:<br> <input type="email" name="email" value="<?= $cliente['email'] ?>"><br><br>

<button type="submit">
Salvar Alterações
</button>

</form>

</body>
</html>
