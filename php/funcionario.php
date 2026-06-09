<?php
// Garante que apenas usuários autenticados possam acessar esta página
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
    <link rel="stylesheet" href="css/treinos.css">
    <script src="../app.js" defer></script>
    <script src="js/treinos.js" defer></script>
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
                <a href="clientes.php">Clientes</a>
            </li>

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

    <div class="overlay-menu">

    </div>
    <!--Menu interativo-->

    <?php
    require "conecta.php";

    $sqlClientes = "SELECT id_cliente, nome FROM cliente";
    $stmtClientes = $pdo->prepare($sqlClientes);
    $stmtClientes->execute();
    $clientes = $stmtClientes->fetchAll(PDO::FETCH_ASSOC);

    $sqlFuncionarios = "SELECT id_funcionario, nome FROM funcionário";
    $stmtFuncionarios = $pdo->prepare($sqlFuncionarios);
    $stmtFuncionarios->execute();
    $funcionarios = $stmtFuncionarios->fetchAll(PDO::FETCH_ASSOC);
    ?>

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

        <label for="grupo_muscular">Grupo Muscular:</label>
        <input type="text" id="grupo_muscular" name="grupo_muscular" required placeholder="Digite o grupo muscular :"><br><br>
        <label for="id_cliente">Cliente:</label>
        <select id="id_cliente" name="id_cliente" required>
            <option value="">Selecione o cliente</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>"><?= htmlspecialchars($cliente['id_cliente'] . ' - ' . $cliente['nome']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="id_funcionario">Funcionário:</label>
        <select id="id_funcionario" name="id_funcionario" required>
            <option value="">Selecione o funcionário</option>
            <?php foreach ($funcionarios as $funcionario): ?>
                <option value="<?= htmlspecialchars($funcionario['id_funcionario']) ?>"><?= htmlspecialchars($funcionario['id_funcionario'] . ' - ' . $funcionario['nome']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <main class="main-funcionario">
        <h2>Treinos Cadastrados</h2>
        <div class="treinos-container">
            <?php
            // Monta a consulta SQL para buscar treinos e dados relacionados
            $sql = "SELECT
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
            ON treinos_exercícios.id_exercicio = exercícios.id_exercicio;";

            // Prepara e executa a query de forma segura com PDO
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // Recupera todos os resultados em um array associativo
            $treinos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Para cada treino recuperado, renderiza um card na página
            foreach ($treinos as $treino) {

                echo "<div class='treino-container'>";
                echo "<div class='treino-item'>";

                echo "<h3>" . htmlspecialchars($treino['nome_treino']) . "</h3>";

                echo "<p><strong>Data:</strong> " . htmlspecialchars($treino['data_inicio']) . "</p>";

                echo "<p><strong>Horário:</strong> " . htmlspecialchars($treino['horario']) . "</p>";

                echo "<p><strong>Exercício:</strong> " . htmlspecialchars($treino['nome_exercicio']) . "</p>";

                echo "<p><strong>Grupo Muscular:</strong> " . htmlspecialchars($treino['grupo_muscular']) . "</p>";

                echo "<p><strong>Séries:</strong> " . htmlspecialchars($treino['series']) . "</p>";

                echo "<p><strong>Repetições:</strong> " . htmlspecialchars($treino['repeticoes']) . "</p>";

                echo "<p><strong>Carga:</strong> " . htmlspecialchars($treino['carga']) . " kg</p>";
                echo "<p><strong>Cliente:</strong> " . htmlspecialchars($treino['nome_cliente']) . "</p>";

                echo "<p><strong>Funcionário:</strong> " . htmlspecialchars($treino['nome_funcionario']) . "</p>";

                echo "<div class='acoes'>";

                echo "<button
                    type='button'
                    class='btn-editar'
                    onclick='abrirModal(
                        " . $treino['id_treino'] . ",
                        " . $treino['id_treino_exercicio'] . ",
                        `" . htmlspecialchars($treino['nome_treino'], ENT_QUOTES) . "`,
                        `" . $treino['data_inicio'] . "`,
                        `" . $treino['horario'] . "`,
                        " . $treino['series'] . ",
                        " . $treino['repeticoes'] . ",
                        " . $treino['carga'] . ",
                        " . $treino['id_cliente'] . ",
                        " . $treino['id_funcionario'] . ",
                        " . $treino['id_exercicio'] . "
                    )'>
                    Editar
                </button>";

                echo "<a
                    href='excluir_treino.php?id=" . $treino['id_treino'] . "'
                    class='btn-excluir'
                    onclick=\"return confirm('Deseja excluir este treino?')\">
                    Excluir
                </a>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

    </main>

    <div id="modalEditar" class="modal">

        <div class="modal-conteudo">

            <span class="fechar" onclick="fecharModal()">
                &times;
            </span>

            <h2>Editar Treino</h2>

            <form action="atualizar_treino.php" method="POST" id="formEdit">

                <input
                    type="hidden"
                    id="id_treino"
                    name="id_treino">

                <input
                    type="hidden"
                    id="id_treino_exercicio_modal"
                    name="id_treino_exercicio">

                <label>Nome do Treino</label>
                <input
                    type="text"
                    id="nome_treino_modal"
                    name="nome_treino">

                <label>Data</label>
                <input
                    type="date"
                    id="data_modal"
                    name="data_inicio">

                <label>Horário</label>
                <input
                    type="time"
                    id="horario_modal"
                    name="horario">

                <label>Séries</label>
                <input
                    type="number"
                    id="series_modal"
                    name="series">

                <label>Repetições</label>
                <input
                    type="number"
                    id="repeticoes_modal"
                    name="repeticoes">

                <label>Carga</label>
                <input
                    type="number"
                    id="carga_modal"
                    name="carga">

                <label>Exercício</label>

                <select id="id_exercicio_modal" name="id_exercicio">
                    <option value="">Selecione um exercício</option>
                    <?php
                    // Consulta para obter os exercícios disponíveis
                    $sqlExercicios = "SELECT id_exercicio, nome FROM exercícios";
                    $stmtExercicios = $pdo->prepare($sqlExercicios);
                    $stmtExercicios->execute();
                    $exercicios = $stmtExercicios->fetchAll(PDO::FETCH_ASSOC);

                    // Gera as opções do select com os exercícios
                    foreach ($exercicios as $exercicio) {
                        echo "<option value='" . $exercicio['id_exercicio'] . "'>" . htmlspecialchars($exercicio['nome']) . "</option>";
                    }
                    ?>
                </select>

                <label>Grupo Muscular</label>
                <input type="text" id="grupo_muscular_modal" name="grupo_muscular">

                <label>Cliente</label>
                <select id="id_cliente_modal" name="id_cliente">
                    <option value="">Selecione o cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>"><?= htmlspecialchars($cliente['id_cliente'] . ' - ' . $cliente['nome']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label>Funcionário</label>
                <select id="id_funcionario_modal" name="id_funcionario">
                    <option value="">Selecione o funcionário</option>
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <option value="<?= htmlspecialchars($funcionario['id_funcionario']) ?>"><?= htmlspecialchars($funcionario['id_funcionario'] . ' - ' . $funcionario['nome']) ?></option>
                    <?php endforeach; ?>
                </select>

                <button
                    type="submit"
                    class="btn-salvar">
                    Salvar Alterações
                </button>



            </form>

        </div>

    </div>




</body>

</html>