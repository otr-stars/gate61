import "./scss/main.scss";

import { CsApp } from './js/CsApp';
import {
    docReady,
} from './js/libs/misc';
import InterfaceLazyLoad from './js/libs/InterfaceLazyLoad';
// import Swiper, { Navigation, Pagination } from 'swiper';


// function initMenu() {
//     let $mobileButton = document.querySelector('.hamburger');
//     let $menu = document.querySelector('header .menu');
//     if (!$mobileButton) return;
//     $mobileButton.addEventListener('click', function () {
//         $mobileButton.classList.toggle('is-active');
//         $menu.classList.toggle('is-active');
//     });
// }

// const csapp = new CsApp();
window.csapp = new CsApp();
csapp.addPlugin('lazyLoad', new InterfaceLazyLoad(csapp));

// csapp.addAction('domScripts', initMenu);

csapp.addAction('beforLoad', function () {
    console.log('Moja funkcja przed wczytaniem', this);
});
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
    console.log('fasfsasaf')
});