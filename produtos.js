// seleciona elementos do DOM
const slides = document.querySelector('.slides');       // container que será movido (display:flex)
const slide = document.querySelectorAll('.slide');     // lista com todos os slides individuais
const prev = document.querySelector('.prev');          // botão "voltar"
const next = document.querySelector('.next');          // botão "avançar"

let index = 0; // índice do slide atual (0 = primeiro)


function showSlide(i) {
  if (i >= slide.length) index = 0;
  if (i < 0) index = slide.length - 1;
  slides.style.transform = `translateX(${-index * 100}%)`;
}

next.addEventListener('click', () => {
  index++;
  showSlide(index);
});

prev.addEventListener('click', () => {
  index--;
  showSlide(index);
});

// Carrossel automático (a cada 4 segundos)
setInterval(() => {
  index++;
  showSlide(index);
}, 4000);
// Adiciona evento de clique ao slide com id "slide1"
  document.getElementById("slides1").addEventListener("click", function() {
    window.location.href = "https://www.google.com";
  });