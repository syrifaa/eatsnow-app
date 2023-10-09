document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const select = dropdown.querySelector('.select');
        const caret = dropdown.querySelector('.caret');
        const menu = dropdown.querySelector('.menu-sort');
        const menuItems = dropdown.querySelectorAll('.menu-sort li');
        const selected = dropdown.querySelector('.selected');


        select.addEventListener('click', () => {
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-sort-open');
        });

        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                selected.innerText = item.innerText;
                select.classList.remove('select-clicked');
                caret.classList.remove('caret-rotate');
                menu.classList.remove('menu-sort-open');
                menuItems.forEach(item => {
                    item.classList.remove('active');
                });
                item.classList.add('active');
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const select = dropdown.querySelector('.select');
        const caret = dropdown.querySelector('.caret');
        const menu = dropdown.querySelector('.menu-filter');
        const menuItems = dropdown.querySelectorAll('.menu-filter li');
        const selected = dropdown.querySelector('.selected');


        select.addEventListener('click', () => {
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-filter-open');
        });

        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                selected.innerText = item.innerText;
                select.classList.remove('select-clicked');
                caret.classList.remove('caret-rotate');
                menu.classList.remove('menu-filter-open');
                menuItems.forEach(item => {
                    item.classList.remove('active');
                });
                item.classList.add('active');
            });
        });
    });
});
