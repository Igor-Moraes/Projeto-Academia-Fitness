// FUNÇÃO PARA O FORMULÁRIO DE CADASTRO 
function cadastroForm(event) {
    event.preventDefault();
    var nome = document.getElementById('nome').value;
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
        nome === "" || email === "" || telefone === "" || modalidade === "" ||
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

}

// FUNÇÕES PARA O CEP
const cepInput = document.getElementById("cep");

// Máscara do CEP
cepInput.addEventListener("input", () => {

    let valor = cepInput.value.replace(/\D/g, "");

    if(valor.length > 5){
        valor = valor.slice(0,5) + "-" + valor.slice(5,8);
    }

    cepInput.value = valor;
});


// Busca automática do endereço
cepInput.addEventListener("blur", async () => {

    let cep = cepInput.value.replace(/\D/g, "");

    if(cep.length !== 8){
        alert("CEP inválido!");
        return;
    }

    try {

        const resposta = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

        const dados = await resposta.json();

        if(dados.erro){
            alert("CEP não encontrado!");
            return;
        }

        document.getElementById("rua").value = dados.logradouro;
        document.getElementById("bairro").value = dados.bairro;
        document.getElementById("cidade").value = dados.localidade;
        document.getElementById("estado").value = dados.uf;

        document.getElementById("numero").focus();

    } catch(error){

        console.log(error);

        alert("Erro ao buscar CEP");
    }
});