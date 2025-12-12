(function($){
    function accordeonAccordeons() {
        const buttons = document.querySelectorAll('.accordeons_button-js');

        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const parentLink = button.closest('.accordeon');

                // Si déjà actif → on le désactive
                if (parentLink.classList.contains('active')) {
                    parentLink.classList.remove('active');
                    return;
                }

                // Sinon → on désactive tous les autres
                document.querySelectorAll('.accordeon.active').forEach(link => {
                    link.classList.remove('active');
                });

                // Et on active celui cliqué
                parentLink.classList.add('active');
            });
        });
    };

    $(function() {
        accordeonAccordeons();
    });
})(jQuery);