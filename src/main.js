import "./scss/main.scss";

import { CsApp } from './js/CsApp';
import {
    docReady,
} from './js/libs/misc';
import InterfaceLazyLoad from './js/libs/InterfaceLazyLoad';
// import Swiper, { Navigation, Pagination } from 'swiper';


function initMenu() {
    let $mobileButton = document.querySelector('.hamburger');
    let $menu = document.querySelector('header .header-menu');
    let $body = document.querySelector('body');
    if (!$mobileButton) return;
    $mobileButton.addEventListener('click', function () {
        $mobileButton.classList.toggle('is-active');
        $menu.classList.toggle('is-active');
        $body.classList.toggle('no-scroll');
    });
}

// const csapp = new CsApp();
window.csapp = new CsApp();
csapp.addPlugin('lazyLoad', new InterfaceLazyLoad(csapp));

// csapp.addAction('domScripts', initMenu);

// new Swiper(".mySwiper", {
//     modules: [Navigation, Pagination],
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     pagination: {
//         el: ".swiper-pagination",
//     },
// });

docReady(() => {
    csapp.ready();
    initMenu();
});