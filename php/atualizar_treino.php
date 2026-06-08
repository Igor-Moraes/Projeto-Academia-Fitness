<?php

// Verifica login
require 'security.php';

// Conecta ao banco
require 'conecta.php';

/*
Recebe os dados enviados pelo formulário
*/
$id_treino = (int) $_POST['id_treino'];

$id_treino_exercicio = (int) $_POST['id_treino_exercicio'];

$nome_treino = $_POST['nome_treino'];

$data_inicio = $_POST['data_inicio'];

$horario = $_POST['horario'];

$series = $_POST['series'];

$repeticoes = $_POST['repeticoes'];

$carga = $_POST['carga'];

/*
Atualiza a tabela treinos
*/
$sql = "
UPDATE treinos
SET
    nome_treino = :nome_treino,
    data_inicio = :data_inicio,
    horario = :horario
WHERE id_treino = :id_treino
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':nome_treino', $nome_treino);
$stmt->bindValue(':data_inicio', $data_inicio);
$stmt->bindValue(':horario', $horario);
$stmt->bindValue(':id_treino', $id_treino);

$stmt->execute();

/*
Atualiza séries, repetições e carga
*/
$sql = "
UPDATE treinos_exercícios
SET
    series = :series,
    repeticoes = :repeticoes,
    carga = :carga
WHERE id_treino_exercicio = :id_treino_exercicio
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':series', $series);
$stmt->bindValue(':repeticoes', $repeticoes);
$stmt->bindValue(':carga', $carga);
$stmt->bindValue(':id_treino_exercicio', $id_treino_exercicio);

$stmt->execute();

/*
Retorna para a página principal
*/
header("Location: funcionario.php");

exit;