function sliderTeaser() {
    const swiperContainer = document.querySelector('.teaser_swiper-js');

    const swiper = new Swiper(swiperContainer, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

$(function() {
    sliderTeaser();
});