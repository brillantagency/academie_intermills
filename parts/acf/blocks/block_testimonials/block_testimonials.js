function sliderTestimonials() {
    const swiperContainer = document.querySelector('.testimonials_swiper-js');

    const swiper = new Swiper(swiperContainer, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
        }
    });
}

$(function() {
    sliderTestimonials();
});