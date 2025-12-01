function menu_open() {
    const btn = document.querySelector('.burger_button');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const menu = document.querySelector('.menu_burger');
        menu.classList.remove('menu_burger_closing');
        menu.classList.add('menu_burger_open');
        document.body.classList.toggle('bg_blur');
    });
}

function menu_close() {
    const closeBtn = document.querySelector('.menu_close');
    const wrapper = document.querySelector('.menu_burger_wrapper_nav');
    const menu = document.querySelector('.menu_burger');

    if (closeBtn) {
        closeBtn.addEventListener('click', function (e) {
            e.preventDefault();
            menu.classList.remove('menu_burger_open');
            menu.classList.add('menu_burger_closing');
            document.body.classList.remove('bg_blur');
        });
    }

    document.addEventListener('click', function (event) {
        if (wrapper && !wrapper.contains(event.target)) {
            menu.classList.remove('menu_burger_open');
            menu.classList.add('menu_burger_closing');
            document.body.classList.remove('bg_blur');
        }
    });
}

function initSmoothScroll() {
    const header = document.querySelector('header');

    function checkScroll() {
        if (window.scrollY > 50) header.classList.add('scrolled-js');
        else header.classList.remove('scrolled-js');
    }

    checkScroll();
    window.addEventListener('scroll', checkScroll);
}

function showMore() {
    document.querySelectorAll('.values_item_button-js').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = button.closest('.values_item');
            if (parent) parent.classList.add('active');
        });
    });
}

function initCircleSlider(swiperSelector, paginationSelector) {
    new Swiper(swiperSelector, {
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        centeredSlidesBounds: true,
        pagination: { 
            el: paginationSelector,
            clickable: true,
        },
        slidesPerView: 3,
        effect: "creative",
        creativeEffect: {
            perspective: true,
            limitProgress: 3,
            prev: {
                translate: ["-90%", "20%", -100],
                rotate: [0, 0, -20],
                origin: "bottom"
            },
            next: {
                translate: ["90%", "20%", -100],
                rotate: [0, 0, 20],
                origin: "bottom"
            }
        }
    });
}

function doAnimations() {
    const anims = document.querySelectorAll(".animatable-js");
    const scrollPos = window.scrollY + window.innerHeight;

    anims.forEach(el => {
        if (el.getBoundingClientRect().top + window.scrollY + el.offsetHeight - 20 < scrollPos) {
            el.classList.remove("animatable-js");
            el.classList.add("animated-js");
        }
    });
}

document.addEventListener("DOMContentLoaded", () => {
    menu_open();
    menu_close();
    initSmoothScroll();
    showMore();
    initCircleSlider(".team_circle_slider__swiper-js", ".team_circle_slider__pagination-js");
    initCircleSlider(".testimonials_circle_slider__swiper-js", ".testimonials_circle_slider__pagination-js");

    window.addEventListener("scroll", doAnimations);
});