function cadastroForm(event) {
    event.preventDefault();
    var nome = document.getElementById('nome').value;
    var sobrenome = document.getElementById('sobrenome').value;
    var email = document.getElementById('email').value;
    var telefone = document.getElementById('telefone').value;
    var modalidade = document.getElementById('modalidade').value;
    var cpf = document.getElementById('cpf').value;
    var genero = document.getElementById('genero').value;
    var dataNascimento = document.getElementById('data_nascimento').value;
    var senha = document.getElementById('senha').value;
    var confirmarSenha = document.getElementById('confirmar_senha').value;

    var mensagem = document.getElementById('mensagem');
    var resultado = document.getElementById('resultado');

    
    if (
        nome === "" || sobrenome === "" || email === "" || telefone === "" || modalidade === "" ||
        cpf === "" || genero === "" || dataNascimento === "" || senha === "" || confirmarSenha === ""
    ) {
        mensagem.style.color = 'red';
        mensagem.innerHTML = "Por favor, preencha todos os campos antes de enviar o formulário.";
        resultado.style.display = "none";
        return;
    } else if (senha !== confirmarSenha) {
        mensagem.style.color = 'red';
        mensagem.innerHTML = "As senhas não coincidem. Por favor, verifique.";
        resultado.style.display = "none";
        return;
    } else {
        mensagem.innerHTML = "";
    }

    resultado.innerHTML = `
        <div id="fechar" onclick="fechaDivResultado()">X</div>
        <div><strong>Nome:</strong> ${nome}</div>
        <div><strong>Sobrenome:</strong> ${sobrenome}</div>
        <div><strong>Email:</strong> ${email}</div>
        <div><strong>Telefone:</strong> ${telefone}</div>
        <div><strong>Modalidade:</strong> ${modalidade}</div>
        <div><strong>CPF:</strong> ${cpf}</div>
        <div><strong>Gênero:</strong> ${genero}</div>
        <div><strong>Data de Nascimento:</strong> ${dataNascimento}</div>
        <div><strong>Senha:</strong> ${senha}</div>
        <div><strong>Confirmar Senha:</strong> ${confirmarSenha}</div>
    `;
    resultado.style.display = "flex";

    // Exibir no console
    console.log("Nome:", nome);
    console.log("Sobrenome:", sobrenome);
    console.log("Email:", email);
    console.log("Telefone:", telefone);
    console.log("Modalidade:", modalidade);
    console.log("CPF:", cpf);
    console.log("Gênero:", genero);
    console.log("Foto:", foto);
    console.log("Data de Nascimento:", dataNascimento);
    console.log("Senha:", senha);
    console.log("Confirmar Senha:", confirmarSenha);
}

function fechaDivResultado() {
    var resultado = document.getElementById("resultado");
    resultado.style.display = "none";
    resultado.style.margin = "0 30px 0 0"
}
