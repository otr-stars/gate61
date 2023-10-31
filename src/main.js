import "./scss/main.scss";

import { CsApp } from './js/CsApp';
import {
    docReady,
} from './js/libs/misc';
import InterfaceLazyLoad from './js/libs/InterfaceLazyLoad';
import Swiper, { Navigation, Pagination } from 'swiper';


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

function adventagesSlider() {
    const swiperAdventages = document.querySelector(".swiper--adventages");
    if (!swiperAdventages) return;
    new Swiper(".swiper--adventages", {
      slidesPerView: 1.15,
      spaceBetween: 10,
        breakpoints: {
          767: {
            slidesPerView: 2.001,
            spaceBetween: 20,
          },
        },
    });
}

const csapp = new CsApp();
csapp.addPlugin('lazyLoad', new InterfaceLazyLoad(csapp));

csapp.addAction("domScripts", adventagesSlider);

docReady(() => {
    csapp.ready();
    initMenu();
});