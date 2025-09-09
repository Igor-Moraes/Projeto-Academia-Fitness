function enviarMensagem ()  { 
var nome = document.getElementById("name").value;
var email = document.getElementById("email").value;
var empresa = document.getElementById("company").value;
var mensagem = document.getElementById("message").value;
if (nome === "" || email === "" || empresa === "" || mensagem === "") {
alert("Por favor, preencha todos os campos antes de enviar a mensagem.");
} else {
alert("Mensagem enviada com sucesso! Entraremos em contato em breve.");
}

console.log("Nome: " + nome);
console.log("E-mail: " + email);
console.log("Empresa: " + empresa);
console.log("Mensagem: " + mensagem);


}

