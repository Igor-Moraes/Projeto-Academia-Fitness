<?php 
require 'security.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <title>Administrador</title>
</head>
<body>
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

     <form class="form_treinos" action="cadastro_treinos.php" method="POST" id="form_treinos">
        <h1>Cadastro de Treinos</h1>
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" id="nome_treino" name="nome_treino" required placeholder="Digite o nome do treino :"><br><br>

        <label for="data">Data </label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="horario">Horário:</label>
        <input type="time" id="horario" name="horario" required><br><br>

        <label for="series">Séries:</label>
        <input type="number" id="series" name="series" required><br><br>

        <label for="repeticoes">Repetições:</label>
        <input type="number" id="repeticoes" name="repeticoes"
            required><br><br>
    
            <label for="carga">Carga (kg):</label>
        <input type="number" id="carga" name="carga" required><br><br>

        <label for="nome_exercicio">Nome do Exercício:</label>
        <input type="text" id="nome_exercicio" name="nome_exercicio" required placeholder="Digite o nome do exercício :"><br><br>
        
        <label for="grupo_muscular" >Grupo Muscular:</label>
        <input type="text" id="grupo_muscular" name="grupo_muscular" required placeholder="Digite o grupo muscular :"><br><br>
        <label for="id_cliente">ID do Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required><br><br>
        <label for="id_funcionario">ID do Funcionário:</label>
        <input type="number" id="id_funcionario" name="id_funcionario" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>