    const menuTrigger = document.getElementById('primary-menu-trigger');
    const menu = document.querySelector('.main_menu_section');


    menuTrigger.addEventListener('click', function () {
        menu.classList.toggle('is-active');
        menu.style.backgroundColor = '#c8ffef';
    });
