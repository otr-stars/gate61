import {
    getHashLocation,
} from './misc';

export default class MenuAnchor {
    $header = null
    // $backButton = null
    $els = null
    $menu = null
    // $hamburger = null
    lastScrollTop = 0
    constructor(csApp) {

        this.$header = document.querySelector('header.header')
        // this.$backButton = document.getElementById("myBtn")
        this.$els = document.querySelectorAll("main > [id]")
        this.$menu = document.querySelector('#menu')
        this.$menuWrapper = document.querySelector('.header-menu')
        // this.$hamburger = document.querySelector('.hamburger');


        csApp.addAction('scrollHandler', () => {
            this.scrollDirection()
            this.watchHash()
        })

        // this.$hamburger.addEventListener('click', () => {
        //     this.toggleMobileMenu();
        // })

        this.$menu.addEventListener('click', (e) => {
            if (csApp.isMobile === false) {
                return;
            }
            if (e.target.nodeName === 'A') {
                this.toggleMobileMenu();
            }
        })

        // if (this.$backButton) {
        //     this.$backButton.addEventListener('click', () => { window.scrollTo(0, 0) })
        // }

        window.addEventListener("hashchange", (e) => {
            e.stopPropagation()
            e.preventDefault()
            this.hashChanged()
        });
        this.hashChanged();
    }
    // toggleMobileMenu() {
    //     this.$hamburger.classList.toggle('is-active');
    //     this.$menuWrapper.classList.toggle('is-active');
    //     this.$header.classList.toggle('is-active');
    // }
    watchHash() {
        //backbutton
        // if (this.$backButton) {
        //     this.$backButton.style.display = (window.scrollY >= (window.screen.availHeight / 4)) ? "block" : 'none'
        // }
        //Sledzenie menu
        const currentPosition = window.scrollY + window.innerHeight / 2.5
        const active = this.$menu.querySelector("a.inview")
        if (active) active.classList.remove("inview")

        this.$els.forEach((item) => {
            const top = item.offsetTop,
                bottom = top + item.clientHeight;
            if (currentPosition >= top && currentPosition <= bottom) {
                const that = this.$menu.querySelector('a[href="/#' + item.id + '"]');
                // // if (!that) {
                // //     that = $menu.querySelector('a[href="' + window.location.href.replace(window.location.hash, '') + '#' + item.id + '"]');
                // // }
                if (that) {
                    that.classList.add("inview");
                }
            }
        });
    }
    scrollDirection() {
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > this.lastScrollTop) {
            // downscroll code
            if (st > this.$header.offsetHeight) {
                this.$header.classList.add('novisible');
                this.$header.classList.add('scrolled');
            }
            this.$header.classList.remove('visible')
        } else if (st < this.lastScrollTop) {
            // upscroll code
            if (st < this.$header.offsetHeight) {
                this.$header.classList.remove('scrolled');
                this.$header.classList.remove('novisible');
            }
            this.$header.classList.add('visible');
        }
        this.lastScrollTop = st <= 0 ? 0 : st;
    }
    hashChanged() {
        //window.scrollTo(0, 0);
        const hash = getHashLocation()
        if (hash) {
            const $target = document.querySelector("#" + hash)
            if (!$target) return;
            if ($target) {
                //     if (isMobile === true) {
                //         $hamburger.click();
                //     }
                window.scrollTo(0, $target.offsetTop - (this.$header.clientHeight + 60))
            }
        }

    }
}

