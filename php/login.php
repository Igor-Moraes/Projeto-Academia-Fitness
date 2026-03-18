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
    <link rel="stylesheet" href="login.css">
    <script src="../app.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>

<nav class="menu-desktop">
        <ul>
            <li><img src="imagens/logo.png" alt="Logo da empresa, um desenho de bíceps com fundo vermelho em círculo"></li> <!--Logo da empresa no menu-->
            <!--Links do menu-->
            <li> <a href="index.html">Início</a> </li>
            <li>
                <a href="#Serviços">Serviços</a>
                <ul>
                    <li> <a href="produtos.html">Produtos</a> </li>
                    <li> <a href="musc.html">Musculação</a> </li>
                    <li> <a href="cross.html">Cross fit</a> </li>
                    <li> <a href="yoga.html">Yoga</a> </li>
                    <li><a href="nutrição.html">Nutrição</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </li>
            <li>
                <a href="contato.html">Contatos</a>
            </li>
            <li>
                <a href="experimental.html">Aula experimental</a>
            </li>
            <li> <a href="sobre.html">Sobre</a></li>
            <li> <a href="faq.html">FAQ</a></li>
            <a href="#" id="btn-entrar">Entrar</a>
        </ul>

    </nav>

            <div class="mobile">
                <img src="imagens/logo.png" alt="Logo da empresa, um desenho de bíceps com fundo vermelho em círculo" id="logo-mobile"> <!--Logo da empresa no menu-->

                           <div class="btn-abrir-menu" id="btn-menu">
                    <img src="imagens/list.svg" alt="Icone de lista"> <!--btn-menu-->
                </div>
            </div>
            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar">
                    <img src="imagens/x-lg.svg" alt="Fechar menu">
                    <a href="login.php" id="btn-mobile">Entrar</a>

                </div> <!--btn-fechar-->

                <nav>
        <ul>
            <!--Links do menu-->
            <li> <a href="index.html">Início</a> </li>
            <li>
                <a href="#Serviços">Serviços</a>
                <ul>
                    <li> <a href="produtos.html">Produtos</a> </li>
                    <li> <a href="musc.html">Musculação</a> </li>
                    <li> <a href="cross.html">Cross fit</a> </li>
                    <li> <a href="yoga.html">Yoga</a> </li>
                    <li><a href="nutrição.html">Nutrição</a></li>
                </ul>
            </li>
            <li>
                <a href="contato.html">Contatos</a>
            </li>
            <li>
                <a href="experimental.html">Aula experimental</a>
            </li>
            <li> <a href="sobre.html">Sobre</a></li>
            <li> <a href="faq.html">FAQ</a></li>
        </ul>
                </nav>

            </div> <!--menu-mobile-->

            <div class="overlay-menu" >

            </div>
    <!--Menu interativo-->
    
    <form class="login-container" action="processa_login.php" method="POST">
        <h1>Entrar</h1>
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="email" required placeholder="Digite seu email ou nome de usuário :"><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha" required placeholder="Digite sua senha :"><br><br>

        <button type="submit">Entrar</button>
    </form>

</body>
</html>