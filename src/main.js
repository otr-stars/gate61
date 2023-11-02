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
      slidesPerView: 2.15,
      spaceBetween: 20,
        breakpoints: {
          320: {
            slidesPerView: 1.07,
            spaceBetween: 10,
          },
          576: {
            slidesPerView: 2.15,
            spaceBetween: 10,
          },
          992: {
            spaceBetween: 20,
          },
        },
    });
}

function modernizationSlider() {
  const swiperModernization = document.querySelector(".swiper--modernization");
  if (!swiperModernization) return;
  new Swiper(".swiper--modernization", {
    slidesPerView: 1.38,
    spaceBetween: 20,
      breakpoints: {
        320: {
          slidesPerView: 1.075,
          spaceBetween: 10,
        },
        576: {
          slidesPerView: 1.38,
          spaceBetween: 10,
        },
        992: {
          spaceBetween: 20,
        },
      },
  });
}

function patioSlider() {
  const swiperPatio = document.querySelector(".swiper--patio");
  if (!swiperPatio) return;
  new Swiper(".swiper--patio", {
    slidesPerView: 1.05,
    spaceBetween: 20,
      breakpoints: {
        320: {
          slidesPerView: 1.075,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 1.05,
          spaceBetween: 10,
        },
        992: {
          spaceBetween: 20,
        },
      },
  });
}

const csapp = new CsApp();
csapp.addPlugin('lazyLoad', new InterfaceLazyLoad(csapp));

csapp.addAction("domScripts", adventagesSlider);
csapp.addAction("domScripts", modernizationSlider);
csapp.addAction("domScripts", patioSlider);

docReady(() => {
    csapp.ready();
    initMenu();
});