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
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="js/cadastro.js" defer></script>
    <script src="../app.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>

<nav class="menu-desktop">
        <ul>
            <li><img src="images/logo.png" alt="Logo da empresa, um desenho de bíceps com fundo vermelho em círculo"></li> <!--Logo da empresa no menu-->
            <!--Links do menu-->
            <li> <a href="..\index.html">Início</a> </li>
            <li>
                <a href="#Serviços">Serviços</a>
                <ul>
                    <li> <a href="..\produtos.html">Produtos</a> </li>
                    <li> <a href="..\musc.html">Musculação</a> </li>
                    <li> <a href="..\cross.html">Cross fit</a> </li>
                    <li> <a href="..\yoga.html">Yoga</a> </li>
                    <li><a href="..\nutrição.html">Nutrição</a></li>
                </ul>
            </li>
            <li>
                <a href="..\contato.html">Contatos</a>
            </li>
            <li>
                <a href="..\experimental.html">Aula experimental</a>
            </li>
            <li> <a href="..\sobre.html">Sobre</a></li>
            <li> <a href="..\faq.html">FAQ</a></li>
              <div id="buttons">
                <a href="cadastro.php" id="btn-entrar">Cadastre - se</a>
                <a href="login.php" id="btn-entrar">Entrar</a>
            </div>
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
            <li> <a href="..\index.html">Início</a> </li>
            <li>
                <a href="#Serviços">Serviços</a>
                <ul>
                    <li> <a href="..\produtos.html">Produtos</a> </li>
                    <li> <a href="..\musc.html">Musculação</a> </li>
                    <li> <a href="..\cross.html">Cross fit</a> </li>
                    <li> <a href="..\yoga.html">Yoga</a> </li>
                    <li><a href="..\nutrição.html">Nutrição</a></li>
                </ul>
            </li>
            <li>
                <a href="..\contato.html">Contatos</a>
            </li>
            <li>
                <a href="..\experimental.html">Aula experimental</a>
            </li>
            <li> <a href="..\sobre.html">Sobre</a></li>
            <li> <a href="..\faq.html">FAQ</a></li>
        </ul>
                </nav>

            </div> <!--menu-mobile-->

            <div class="overlay-menu" >

            </div>
    <!--Menu interativo-->
        <header>
            <h1>Cadastro</h1>
             <p>Faça já seu cadastro na nossa academia! Receba treinos especializados de acordo com a sua preferência, acompanhamento com nutricionistas e tenha acesso a várias promoções exclusivas nos produtos que vendemos. Venha fazer parte da nossa família! </p>

        </header>
        
        


        <main>
        <div class="form-container">
            <form  action="cadastro_clientes.php" method="post" enctype="multipart/form-data">
                <h2>Formulário de Cadastro</h2>
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required placeholder="00+ (00) 0000-0000">
                <label for="modalidade">Modalidade de Interesse:</label>
                <select id="modalidade" name="modalidade" required>
                    <option value="">Selecione uma modalidade</option>
                    <option value="musculacao">Musculação</option>
                    <option value="crossfit">Cross Fit</option>
                    <option value="yoga">Yoga</option>
                    <option value="nutricionista">Nutricionista</option>
                </select>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                    title="Formato: 000.000.000-00" placeholder="000.000.000-00">

                    <h3 class="titulo-endereco">Endereço</h3>
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" placeholder="00000-000">
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua">
                <label for="numero">Número:</label>
                <input type="number" id="numero" name="numero">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento">
                <label for="genero">Gênero:</label>
                <select id="genero" name="genero" required>
                    <option value="">Selecione um gênero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>
                <button type="submit" id="cadastro">Cadastrar</button>

            </form>
            <div id="resultado" class="caixa-resultado" style="display:none;"></div>
        </div>
        <div id="mensagem"><!-- Mensagem de sucesso ou erro será exibida aqui -->



        </div>

    </main>




    
    
 

</body>
</html>