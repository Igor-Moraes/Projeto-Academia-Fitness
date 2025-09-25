document.addEventListener('DOMContentLoaded', () => {
    // 1. Seleciona os elementos necessários
    const slidesContainer = document.querySelector('.slides');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const slides = document.querySelectorAll('.slide');

    let currentSlide = 0;
    const totalSlides = slides.length;

    // Verificação de segurança: Se não houver slides, para a execução
    if (totalSlides === 0) return;

    // Função para mover os slides
    function updateCarousel() {
        slidesContainer.style.transform = `translateX(${-currentSlide * 100}%)`;
        slidesContainer.style.transition = 'transform 0.5s ease-in-out';
    }

    // 3. Evento de clique para o botão 'Próximo'
    nextButton.addEventListener('click', () => {
        // Move para o próximo slide, voltando ao 0 após o último (loop infinito)
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    });

    // 4. Evento de clique para o botão 'Anterior'
    prevButton.addEventListener('click', () => {
        // Move para o slide anterior, indo para o último slide se estiver no 0 (loop infinito)
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });

    // Inicializa a posição do carrossel no slide 0
    updateCarousel();
});

// ... no JavaScript ...
const totalSlides = slides.length;
const slideWidthPercentage = 100 / totalSlides; // Isso garante que não fica bugado!
// ...