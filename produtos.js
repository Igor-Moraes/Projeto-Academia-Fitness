// Seleciona todos os carrosséis
document.addEventListener('DOMContentLoaded', () => {
    const slidesContainer = document.querySelector('.slides');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const slides = document.querySelectorAll('.slide');

    let currentSlide = 0;
    const totalSlides = slides.length;

    // Função para mover os slides
    function updateCarousel() {
        const offset = -currentSlide * (100 / totalSlides);
        slidesContainer.style.transform = `translateX(${offset}%)`;
    }

    // Evento de clique para o botão 'Próximo'
    nextButton.addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    });

    // Evento de clique para o botão 'Anterior'
    prevButton.addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });
});