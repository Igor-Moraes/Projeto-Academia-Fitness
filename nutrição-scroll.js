// Script para ativar animações ao rolar usando Intersection Observer
(function () {
    // Seletores que queremos observar: título, cards de depoimento e consultas
    const targets = document.querySelectorAll('#nutricionistas h2, .depoimento-card, .nutri-consultation');

    if (!('IntersectionObserver' in window)) {
        // fallback simples: adiciona in-view a tudo se não suportado
        targets.forEach(el => el.classList.add('in-view'));
        return;
    }

    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                // Se você quiser que a animação ocorra apenas uma vez, desobserve
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    targets.forEach(el => observer.observe(el));
})();
