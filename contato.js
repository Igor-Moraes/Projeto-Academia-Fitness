function enviarMensagem ()  { 
var nome = document.getElementById("name").value;
var email = document.getElementById("email").value;
var empresa = document.getElementById("company").value;
var mensagem = document.getElementById("message").value;
if (nome === "" || email === "" || mensagem === "") {
alert("Por favor, preencha todos os campos antes de enviar a mensagem.");
} else {
alert("Mensagem enviada com sucesso! Entraremos em contato em breve.");
} 

console.log("Nome: " + nome);
console.log("E-mail: " + email);
console.log("Empresa: " + empresa);
console.log("Mensagem: " + mensagem);

 let numero = "553298848108"; // Substitua pelo seu número com código do país e DDD
    
  let texto = `Nome: ${nome}\nEmail: ${email}\nEmpresa: ${empresa}\nMensagem: ${mensagem}`;
  let link = `https://wa.me/${numero}?text=${encodeURIComponent(texto)}`;

  window.open(link);
}

