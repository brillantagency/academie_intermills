function dynamicNumber() {
    const counters = document.querySelectorAll('.reassurances_number');

    counters.forEach(counter => {
        // si déjà animé, skip
        if (counter.dataset.animated) return;

        const elTop = counter.getBoundingClientRect().top + window.scrollY;
        const scrollPos = window.scrollY + window.innerHeight;

        if (elTop < scrollPos - 20) {
            counter.dataset.animated = 'true';

            const target = parseInt(counter.getAttribute('data-target'), 10);
            if (isNaN(target)) return;

            counter.textContent = '0'; // 👈 démarre visuellement à 0

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
                }
            }

            requestAnimationFrame(updateCounter);
        }
    });
}

// déclenche au chargement et au scroll
document.addEventListener('DOMContentLoaded', dynamicNumber);
window.addEventListener('scroll', dynamicNumber);