function sliderBanner() {
    const swiperContainer = document.querySelector('.banner_swiper-js');

    const swiper = new Swiper(swiperContainer, {
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".banner_next",
            prevEl: ".banner_prev",
        },
    });
}

$(function() {
    sliderBanner();
});