function dynamicNumber() {
    const counters = document.querySelectorAll('.reassurances_number');

    counters.forEach(counter => {
        // si déjà animé, skip
        if (counter.dataset.animated) return;

        const elTop = counter.getBoundingClientRect().top + window.scrollY;
        const scrollPos = window.scrollY + window.innerHeight;

        if (elTop < scrollPos - 20) { // 20px avant le bas de l'écran
            const target = +counter.getAttribute('data-target');
            if (!target) return;

            let current = 0;
            const duration = 2000;
            const startTime = performance.now();

            function updateCounter(timestamp) {
                const elapsed = timestamp - startTime;
                const progress = Math.min(elapsed / duration, 1);
                counter.textContent = Math.floor(progress * target);

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                    counter.dataset.animated = 'true';
                }
            }

            requestAnimationFrame(updateCounter);
        }
    });
}

// déclenche au chargement et au scroll
document.addEventListener('DOMContentLoaded', dynamicNumber);
window.addEventListener('scroll', dynamicNumber);