<?php

// Abre a conexão com o banco de dados.
require_once 'conecta.php';
// Verifica se o usuário está logado.
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
    <script src="app.js" defer></script>
    <link rel="stylesheet" href="..\mobile.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="..\app.js" defer></script>
    <!--link rel="stylesheet" href="css/estilo.css" -->

    <style>

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        main h2 {
            color: #E50914;
            margin-bottom: 20px;
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            
        }
        .treino-card {
            border: 1px solid #E50914;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            background-color: #000000;
            color: #FFFFFF;
            box-shadow: 0 4px 8px rgba(207, 6, 6, 0.52);
            animation: opacityAnimation 2s ease-in-out;
        }

        .treino-card h3 {
            margin-top: 0;
            color: #E50914;
        }

        @keyframes opacityAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }

    }

    .sem-treinos {
        text-align: center;
        color: #E50914;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
     
}
    .sem-treinos-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #000000;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(207, 6, 6, 0.52);
    }
    .btn-contato {
        display: inline-block;
        padding: 10px 20px;
        background-color: #E50914;
        color: #FFFFFF;
        text-decoration: none;
        border-radius: 4px;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        align-items: center;
        margin-top: 20px;
        margin-left: 250px;
        font-size: 18px;
        transition: background-color 0.3s ease;
}

.btn-contato:hover {
        background-color: #B20710;
}

    </style>
</header>

<body>
    <nav class="menu-desktop">
        <ul>
            <h2>
                👋 Bem vindo, <?php echo $_SESSION['cliente_nome']; ?>
            </h2>
            </li>
            <a href="logout.php" id="btn-entrar" style="margin-top: 18px; font-family: 'Roboto', sans-serif; font-size: 18px;">Sair</a>
        </ul>

    </nav>

    <!--Menu Mobile -->
    <div class="mobile">
        <!--Logo da empresa no menu-->

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

    <div class="overlay-menu">

    </div>
    <!--Menu interativo-->

    <main>
        <?php
        // Busca os treinos do cliente que está logado.
        $sqlTreinos = "SELECT
                treinos.id_treino,
                treinos.nome_treino,
                treinos.data_inicio,
                treinos.horario,

                cliente.id_cliente,
                funcionário.id_funcionario,
                treinos_exercícios.id_treino_exercicio,
                exercícios.id_exercicio,

                exercícios.nome AS nome_exercicio,
                exercícios.grupo_muscular,

                treinos_exercícios.series,
                treinos_exercícios.repeticoes,
                treinos_exercícios.carga,

                cliente.nome AS nome_cliente,
                funcionário.nome AS nome_funcionario

            FROM treinos

            JOIN cliente
            ON treinos.id_cliente = cliente.id_cliente

            JOIN funcionário
            ON treinos.id_funcionario = funcionário.id_funcionario

            JOIN treinos_exercícios
            ON treinos.id_treino = treinos_exercícios.id_treino

            JOIN exercícios
            ON treinos_exercícios.id_exercicio = exercícios.id_exercicio

            WHERE treinos.id_cliente = :id_cliente
            ORDER BY treinos.data_inicio, treinos.horario";

        // Prepara a consulta com segurança.
        $stmtTreinos = $pdo->prepare($sqlTreinos);
        // Envia o ID do cliente para a consulta.
        $stmtTreinos->execute([
            'id_cliente' => $_SESSION['cliente_id']
        ]);
        // Pega todos os resultados encontrados.
        $resultTreinos = $stmtTreinos->fetchAll(PDO::FETCH_ASSOC);
        // Se tiver treinos, mostra na tela.
        if (count($resultTreinos) > 0) {
            echo "<h2>Seus Treinos:</h2>";
            // Mostra um treino por vez.
            foreach ($resultTreinos as $rowTreino) {
                echo "<div class='treino-card'>";
                echo "<h3>" . htmlspecialchars($rowTreino['nome_treino']) . "</h3>";
                echo "<p>Data: " . htmlspecialchars($rowTreino['data_inicio']) . "</p>";
                echo "<p>Horário: " . htmlspecialchars($rowTreino['horario']) . "</p>";
                echo "<p>Exercício: " . htmlspecialchars($rowTreino['nome_exercicio']) . "</p>";
                echo "<p>Grupo Muscular: " . htmlspecialchars($rowTreino['grupo_muscular']) . "</p>";
                echo "<p>Séries: " . htmlspecialchars($rowTreino['series']) . "</p>";
                echo "<p>Repetições: " . htmlspecialchars($rowTreino['repeticoes']) . "</p>";
                echo "<p>Carga: " . htmlspecialchars($rowTreino['carga']) . "</p>";
                echo "<p>Treinador: " . htmlspecialchars($rowTreino['nome_funcionario']) . "</p>";
                echo "</div>";
            }
        } else {
            // Se não tiver treinos, avisa o usuário.
            echo "<div class='sem-treinos-container'>";
            echo "<p class='sem-treinos'>Você não possui nenhum treino cadastrado.</p>";
            echo "<p class='sem-treinos'>Entre em contato com um de nossos treinadores para criar seu primeiro treino personalizado!</p>"; 
            echo "<p class='sem-treinos'>Estamos ansiosos para ajudar você a alcançar seus objetivos de fitness!</p>";
            echo "<a href='../contato.html' class='btn-contato'>Contato</a>";
            echo "</div>";
        }
        ?>


    </main>



</body>

</html>