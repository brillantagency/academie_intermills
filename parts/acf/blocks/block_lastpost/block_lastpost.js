document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.lastpost_slider_swiper-js', {
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.lastpost_next',
            prevEl: '.lastpost_prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            }
        }
    });
});
