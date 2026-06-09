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

$id_exercicio = (int) $_POST['id_exercicio'];

$grupo_muscular = $_POST['grupo_muscular'];

$id_cliente = (int) $_POST['id_cliente'];

$id_funcionario = (int) $_POST['id_funcionario'];

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
Atualiza o vínculo do exercício e seus atributos
*/
$sql = "
UPDATE treinos_exercícios
SET
    id_exercicio = :id_exercicio,
    series = :series,
    repeticoes = :repeticoes,
    carga = :carga
WHERE id_treino_exercicio = :id_treino_exercicio
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id_exercicio', $id_exercicio, PDO::PARAM_INT);
$stmt->bindValue(':series', $series, PDO::PARAM_INT);
$stmt->bindValue(':repeticoes', $repeticoes, PDO::PARAM_INT);
$stmt->bindValue(':carga', $carga, PDO::PARAM_INT);
$stmt->bindValue(':id_treino_exercicio', $id_treino_exercicio, PDO::PARAM_INT);

$stmt->execute();

/*
Atualiza o grupo muscular do exercício selecionado
*/
$sql = "
UPDATE exercícios
SET
    grupo_muscular = :grupo_muscular
WHERE id_exercicio = :id_exercicio
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':grupo_muscular', $grupo_muscular);
$stmt->bindValue(':id_exercicio', $id_exercicio, PDO::PARAM_INT);

$stmt->execute();

/*
Atualiza cliente e funcionário do treino
*/
$sql = "
UPDATE treinos
SET
    id_cliente = :id_cliente,
    id_funcionario = :id_funcionario
WHERE id_treino = :id_treino
";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt->bindValue(':id_funcionario', $id_funcionario, PDO::PARAM_INT);
$stmt->bindValue(':id_treino', $id_treino, PDO::PARAM_INT);

$stmt->execute();

/*
Retorna para a página principal
*/
header("Location: funcionario.php");

exit;
