// seleciona elementos do DOM (checa se existem antes de usar)
const slides = document.querySelector('.slides');       // container que será movido (display:flex)
let slide = slides ? slides.querySelectorAll('.slide') : document.querySelectorAll('.slide');     // lista com todos os slides individuais (scope ao container .slides)
const prev = document.querySelector('.prev');          // botão "voltar"
const next = document.querySelector('.next');          // botão "avançar"

let index = 0; // índice do slide atual (0 = primeiro)

function showSlide1() {
  // Recalcula a lista de slides dentro do container para evitar misturar com outros carrosséis
  if (slides) slide = slides.querySelectorAll('.slide');
  if (!slide || slide.length === 0 || !slides) return;
  if (index >= slide.length) index = 0;
  if (index < 0) index = slide.length - 1;
  slides.style.transform = `translateX(${-index * 100}%)`;
}

if (next) {
  next.addEventListener('click', () => {
    index++;
    showSlide1();
  });
}

if (prev) {
  prev.addEventListener('click', () => {
    index--;
    showSlide1();
  });
}

// Carrossel automático (a cada 4 segundos)
setInterval(() => {
  index++;
  showSlide1();
}, 4000);




const slides2 = document.querySelector('.slides_2');       // container que será movido (display:flex)
let slide2 = slides2 ? slides2.querySelectorAll('.slide_2, .slide') : document.querySelectorAll('.slide_2, .slide');     // lista com todos os slides individuais (aceita .slide_2 ou .slide)
const prev2 = document.querySelector('.prev2');          // botão "voltar"
const next2 = document.querySelector('.next2');          // botão "avançar"
let index2 = 0; // índice do slide atual (0 = primeiro)

function showSlide2() {
  // Recalcula a lista de slides a partir do container para ser resiliente a classes mistas no HTML
  if (slides2) slide2 = slides2.querySelectorAll('.slide_2, .slide');
  if (!slide2 || slide2.length === 0 || !slides2) return;
  if (index2 >= slide2.length) index2 = 0;
  if (index2 < 0) index2 = slide2.length - 1;
  slides2.style.transform = `translateX(${-index2 * 100}%)`;
}

if (next2) {
  next2.addEventListener('click', () => {
    index2++;
    showSlide2();
  });
}

if (prev2) {
  prev2.addEventListener('click', () => {
    index2--;
    showSlide2();
  });
}

// Carrossel automático (a cada 4 segundos)
setInterval(() => {
  index2++;
  showSlide2();
}, 4000);
