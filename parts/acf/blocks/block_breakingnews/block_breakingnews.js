document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.breakingnews_swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: ".breakingnews_next",
            prevEl: ".breakingnews_prev",
        },
    });
});