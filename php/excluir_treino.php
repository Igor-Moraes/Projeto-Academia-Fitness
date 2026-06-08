<?php

// Verifica login
require 'security.php';

// Conecta ao banco
require 'conecta.php';

/*
Recebe o ID enviado pelo botão Excluir
*/
$id = (int) $_GET['id'];

/*
Primeiro exclui o relacionamento
entre treino e exercício
*/
$sql = "
DELETE FROM treinos_exercícios
WHERE id_treino = :id
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id);

$stmt->execute();

/*
Depois exclui o treino
*/
$sql = "
DELETE FROM treinos
WHERE id_treino = :id
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id);

$stmt->execute();

/*
Volta para a página principal
*/
header("Location: funcionario.php");

exit;