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

    <meta charset="UTF-8">
    <title>Administrador - Clientes</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        /* Container centralizado */
        .search-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px auto;
            gap: 15px;
        }

        /* Linha com input + checkboxes */
        .search-row {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Campo de texto */
        .search-row input[type="text"] {
            width: 500px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 13px;
        }

        /* Grupo de checkboxes */
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        .checkbox-group label {
            font-weight: bold;
            cursor: pointer;
        }
        .checkbox-group input[type="checkbox"] {
            accent-color: #e63946;
            transform: scale(1.2);
            margin-right: 5px;
        }

        /* Botões abaixo */
        .search-buttons {
           margin-top: 10px;
        }
        .btn-pesquisar {
            background-color: #2a9d8f;
            color: #fff;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            margin-right: 10px;
        }
        .btn-pesquisar:hover {
            background-color: #21867a;
        }
        .btn-limpar {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-limpar:hover {
            background-color: #c72c38;
        }

        /* Estilo da tabela */
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        thead {
            background-color: #2a9d8f;
            color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        /* tr:hover {
            background-color: #f1f1f1;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        } */
    </style>
</head>
<body style="color: #f9f9f9;">
    <h1 style="font-size: 35px; font-weight: bold; margin: 40px 25px; text-shadow: #E50914 0px 0px 10px, #E50914 0px 0px 20px, #E50914 0px 0px 30px;">Clientes</h1>

    <!-- Área de busca centralizada -->
    <form method="GET" action="" class="search-container">
        <div class="search-row">
            <input type="text" name="busca" placeholder="Digite o termo">
            
            <div class="checkbox-group">
                <label><input type="checkbox" name="campos[]" value="id_cliente"> ID</label>
                <label><input type="checkbox" name="campos[]" value="nome"> Nome</label>
                <label><input type="checkbox" name="campos[]" value="cpf"> CPF</label>
                <label><input type="checkbox" name="campos[]" value="email"> E-mail</label>
                <label><input type="checkbox" name="campos[]" value="telefone"> Telefone</label>
                <label><input type="checkbox" name="campos[]" value="endereco"> Endereço</label>
            </div>
        </div>

        <div class="search-buttons">
            <button type="submit" class="btn-pesquisar">Pesquisar</button>
            <a href="clientes.php" class="btn-limpar">Limpar</a>
        </div>
    </form>

    <!-- Tabela -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $busca = isset($_GET['busca']) ? $_GET['busca'] : '';
        $campos = isset($_GET['campos']) ? $_GET['campos'] : [];

        $sql = "SELECT cliente.*, endereco.*
                FROM cliente
                JOIN endereco ON cliente.id_endereco = endereco.id_endereco";

        if (!empty($busca) && !empty($campos)) {
            $filtros = [];
            foreach ($campos as $campo) {
                $filtros[] = "$campo LIKE :busca";
            }
            $sql .= " WHERE " . implode(" OR ", $filtros);
        }

        $stmt = $pdo->prepare($sql);
        if (!empty($busca) && !empty($campos)) {
            $stmt->execute(['busca' => "%$busca%"]);
        } else {
            $stmt->execute();
        }

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id_cliente'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['rua'] . ", " . $row['numero_casa'] . " - " . $row['bairro'] . ", " . $row['cidade'] . "-" . $row['estado'] . " , " . $row['cep'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
