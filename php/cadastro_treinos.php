<?php
require "security.php";
require "conecta.php";


$nome_treino = $_POST['nome_treino'];
$data_inicio = $_POST['data'];
$horario = $_POST['horario'];
$series = $_POST['series'];
$repeticoes = $_POST['repeticoes'];
$carga = $_POST['carga'];
$nome_exercicio = $_POST['nome_exercicio'];
$grupo_muscular = $_POST['grupo_muscular'];
$id_cliente = $_POST['id_cliente'];
$id_funcionario = $_POST['id_funcionario'];

try  {
    $pdo->beginTransaction();
    $sqlTreino = "INSERT INTO treinos (nome_treino, data_inicio , horario, id_cliente, id_funcionario) VALUES (:nome_treino, :data_inicio, :horario, :id_cliente, :id_funcionario)";
    $stmtTreino = $pdo->prepare($sqlTreino);
    $stmtTreino->execute([
        'nome_treino' => $nome_treino,
        'data_inicio' => $data_inicio,
        'horario' => $horario,
        'id_cliente' => $id_cliente,
        'id_funcionario' => $id_funcionario
    ]);
    $id_treino = $pdo->lastInsertId();
    $sqlExercicio = "INSERT INTO exercícios (nome, grupo_muscular) 
    VALUES (:nome, :grupo_muscular)";
    $stmtExercicio = $pdo->prepare($sqlExercicio);
    $stmtExercicio->execute([
        'nome' => $nome_exercicio,
        'grupo_muscular' => $grupo_muscular
    ]);
    $id_exercicio = $pdo->lastInsertId();
    $sqlTreinoExercicio = "INSERT INTO treinos_exercícios (id_treino, id_exercicio, series, repeticoes, carga)
    VALUES (:id_treino, :id_exercicio, :series, :repeticoes, :carga)";
    $stmtTreinoExercicio = $pdo->prepare($sqlTreinoExercicio);
    $stmtTreinoExercicio->execute([
        'id_treino' => $id_treino,
        'id_exercicio' => $id_exercicio,
        'series' => $series,
        'repeticoes' => $repeticoes,
        'carga' => $carga
    ]);
} catch (PDOException $e) {
    $pdo->rollback();
    throw $e;
}
$pdo->commit();
header("Location: funcionario.php");
exit();


?>