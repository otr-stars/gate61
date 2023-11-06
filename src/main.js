import "./scss/main.scss";

import { CsApp } from './js/CsApp';
import {
    docReady,
} from './js/libs/misc';
import InterfaceLazyLoad from './js/libs/InterfaceLazyLoad';
import Swiper, { Pagination } from 'swiper';
import csTabs from './js/libs/csTabs';

import pZooms from './js/f-panzoom.js';
import pZoomsH from './js/f-panzoom-horizontal.js';


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

function gallerySlider() {
  const swiperGallery = document.querySelector(".swiper--gallery");
  if (!swiperGallery) return;
  new Swiper(".swiper--gallery", {
    slidesPerView: 1.6,
    spaceBetween: 25,
      breakpoints: {
        320: {
          slidesPerView: 1.075,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 1.06,
          spaceBetween: 10,
        },
        992: {
          spaceBetween: 25,
        },
      },
  });
}

function levelsSlider() {
  const swiperLevels = document.querySelector(".swiper--levels");
  if (!swiperLevels) return;

  new Swiper(".swiper--levels", {
    modules: [Pagination],
    spaceBetween: 25,
    simulateTouch: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="btn btn-outline ' + className + '">Piętro ' + (index + 2) + "</span>";
      },
    },
  });
}

const csapp = new CsApp();
csapp.addPlugin('lazyLoad', new InterfaceLazyLoad(csapp));
csapp.pZooms = pZooms;

csapp.addAction("domScripts", adventagesSlider);
csapp.addAction("domScripts", modernizationSlider);
csapp.addAction("domScripts", patioSlider);
csapp.addAction("domScripts", gallerySlider);
csapp.addAction("domScripts", levelsSlider);

docReady(() => {
    csapp.ready();
    pZooms.init();
		pZoomsH.init();
    csTabs(csapp);
    initMenu();
});