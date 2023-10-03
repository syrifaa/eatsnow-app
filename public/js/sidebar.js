let menu = document.querySelector('#menu-btn');
let sidebar = document.querySelector('.sidebar');

menu.onclick = () => {
    menu.classList.toggle('active');
    sidebar.classList.toggle('active');
}