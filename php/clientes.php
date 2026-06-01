<?php

require 'security.php';
require 'conecta.php';


?>
<!doctype html>
<html>
<head>
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="favicon-64x64.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="512x512" href="favicon-512x512.png">
    <link rel="icon" href="favicon.ico">
    <link href="../mobile.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="../app.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador-Clientes</title>
	
</head>
<body style="color: #a1a1a1;">
     <nav class="menu-desktop">
        <ul>
            <li><img src="images/logo.png" alt="Logo da empresa, um desenho de bíceps com fundo vermelho em círculo"></li> <!--Logo da empresa no menu-->
            <!--Links do menu-->
            <li> <a href="funcionario.php"> Cadastro de Treinos
            </a> </li>
            <li>
                <a href="clientes.php">Clientes</a> </li>

              <li><a href="logout.php" id="btn-sair">Sair</a></li>
            
        </ul>

    </nav>

            <div class="mobile">
                <img src="images/logo.png" alt="Logo da empresa, um desenho de bíceps com fundo vermelho em círculo" id="logo-mobile"> <!--Logo da empresa no menu-->

                           <div class="btn-abrir-menu" id="btn-menu">
                    <img src="images/list.svg" alt="Icone de lista"> <!--btn-menu-->
                </div>
            </div>
            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar">
                    <img src="images/x-lg.svg" alt="Fechar menu">
                     <div id="buttons">
                <a href="cadastro.php" id="btn-entrar">Cadastre - se</a>
                <a href="login.php" id="btn-entrar">Entrar</a>
            </div>

                </div> <!--btn-fechar-->

                <nav>
        <ul>
            <!--Links do menu-->
            <li> <a href="funcionario.php">Cadastro Treinos</a> </li>
            <li>
                <a href="#Serviços">Clientes</a>
    
            
        </ul>
                </nav>

            </div> <!--menu-mobile-->

            <div class="overlay-menu" >

            </div>
    <!--Menu interativo-->
<h1>Clientes</h1>
<?php
$sql = "SELECT cliente.*,endereço.*
        FROM cliente
        JOIN endereço
        ON cliente.id_endereço = endereço.id_endereço";
	$stmt = $pdo->query($sql);
	//Com loop usando while
	
	while ($row = $stmt->fetch()) {
        echo "ID: " . $row['id_cliente'] . "<br>";
        echo "Nome: " . $row['nome'] . "<br>";
        echo "CPF: " . $row['cpf'] . "<br>";
        echo "E-mail: " . $row['email'] . "<br>";
		echo "Telefone: " . $row['telefone'] . "<br>";
        echo "Endereço: " . $row['rua'] . ", " . $row['numero_casa'] . " - " . $row['bairro'] . ", " . $row['cidade'] . "-". $row['estado'] . " , " . $row['cep']. "<br>";
		
        echo "-----------------------<br>";
    }



?></html>   