let btnMenu = document.getElementById('btn-menu');
let menu = document.getElementById('menu-mobile');
let overlay = document.querySelector('.overlay-menu');
let btnFechar = document.querySelector('.btn-fechar');

const closeMobileMenu = () => {
    menu.classList.remove('abrir');
    document.querySelectorAll('.menu-mobile nav ul > li.ativo').forEach(item => {
        item.classList.remove('ativo');
        const submenu = item.querySelector('ul');
        if (submenu) submenu.classList.remove('aberto');
    });
};

btnMenu.addEventListener('click', () => {
    menu.classList.add('abrir');
});

btnFechar.addEventListener('click', closeMobileMenu);

overlay.addEventListener('click', closeMobileMenu);

// Controlar expansão/recolhimento do submenu no mobile
document.querySelectorAll('.menu-mobile nav ul > li').forEach(item => {
    // Verifica se tem submenu
    if (item.querySelector('ul')) {
        item.querySelector('a').addEventListener('click', function (e) {
            // Verifica se é mobile (quando menu-mobile tem width > 0)
            if (window.innerWidth <= 1020) {
                e.preventDefault();

                // Fecha outros submenus abertos ao abrir um novo
                document.querySelectorAll('.menu-mobile nav ul > li.ativo').forEach(other => {
                    if (other !== item) {
                        other.classList.remove('ativo');
                        const otherSub = other.querySelector('ul');
                        if (otherSub) otherSub.classList.remove('aberto');
                    }
                });

                const submenu = item.querySelector('ul');
                const isOpen = submenu.classList.toggle('aberto');
                item.classList.toggle('ativo', isOpen);
            }
        });
    }
});

// Fechar menu ao clicar em um link (exceto em itens com submenu)
document.querySelectorAll('.menu-mobile nav a').forEach(link => {
    if (!link.parentElement.querySelector('ul')) {
        link.addEventListener('click', () => {
            menu.classList.remove('abrir');
        });
    }
});