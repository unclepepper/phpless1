const deviceMenu = document.querySelector('.device-menu');
const hiddenMenuWrap = document.querySelector('.hidden-menu-wrap');
const hiddenMenu = document.querySelector('.hidden-menu');
const closeM = document.querySelector('.close');
const closeImg = document.querySelector('.close img');




document.addEventListener('DOMContentLoaded', function() {
    deviceMenu.addEventListener('click', mobileMenu);
    closeImg.addEventListener('click', closeMenu);



});

function mobileMenu() {

    // hiddenMenu.style.display = 'block';

    hiddenMenuWrap.classList.toggle("block");
    hiddenMenu.classList.toggle("block");


}

function closeMenu() {

    hiddenMenu.classList.remove(".block");
    hiddenMenu.classList.remove(".block");




}


function animation() {
    let coordY = 50;

    if (coordY == 150) {
        clearInterval();
    } else {
        coordY++;
        hiddenMenu.style.top = coordY + 'px';
    }

}