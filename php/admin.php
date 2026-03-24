<?php

require 'security.php';



?>
<!doctype html>
<html>
<header>
	<title>Bem vindo !</title>
	<meta lang="pt-br">
    <meta charset="UTF-8">
	    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="favicon-64x64.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="512x512" href="favicon-512x512.png">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css"> <!--Conecta o HTML ao CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js" defer ></script>
	<link rel="stylesheet" href="..\mobile.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="..\app.js" defer></script>
	<!--link rel="stylesheet" href="css/estilo.css" -->
</header>
<body>
	<nav class="menu-desktop">
        <ul>
            <li><img src="images/rodrigo.jpg" alt="Foto do Usuário " id="usuario"></li> <!--Logo da empresa no menu-->
            <!--Links do menu-->
			<li><h2>Rodigo Pereira Silva</h2></li>
            <a href="logout.php" id="btn-entrar" style="margin-top: 18px; font-family: 'Roboto', sans-serif; font-size: 18px;">Sair</a>
        </ul>

    </nav>

	<!--Menu Mobile -->
            <div class="mobile">
                <img src="images/rodrigo.jpg" alt="Foto do Usuário " id="logo-mobile"> <!--Logo da empresa no menu-->

                           <div class="btn-abrir-menu" id="btn-menu">
                    <img src="images/list.svg" alt="Icone de lista"> <!--btn-menu-->
                </div>
            </div>
            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar">
                    <img src="images/x-lg.svg" alt="Fechar menu">
                   <a href="logout.php" id="btn-mobile">Sair</a>

                </div> <!--btn-fechar-->

                <nav>
        <ul>
		
            <!--Links do menu-->
           
        </ul>
                </nav>

            </div> <!--menu-mobile-->

            <div class="overlay-menu" >

            </div>
    <!--Menu interativo-->
	
	
	
</body>
</html>