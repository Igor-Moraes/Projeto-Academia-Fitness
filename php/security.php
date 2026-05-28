<?php
session_start();

if (
    !isset($_SESSION['cliente_id']) &&
    !isset($_SESSION['funcionario_id'])
) {

    header("Location: login.php");
    exit;
}

?>