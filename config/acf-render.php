<?php 

add_action('acf/render_field', function($field) {
    // Ne cible que les champs dans le flexible content
    if (!isset($field['parent_layout'])) return;

    $layout_key = $field['parent_layout'];

    // Récupère le champ parent (le flexible content)
    $parent_field = acf_get_field($field['parent']);

    // Cherche le nom du layout correspondant à la clé
    $layout_name = null;
    if ($parent_field && isset($parent_field['layouts']) && is_array($parent_field['layouts'])) {
        foreach ($parent_field['layouts'] as $layout) {
            if ($layout['key'] === $layout_key) {
                $layout_name = $layout['name'];  // Le nom lisible du layout
                break;
            }
        }
    }

    if (!$layout_name) {
        $layout_name = $layout_key; // fallback, on met la clé
    }

    $image_url = get_template_directory_uri() . '/acf-previews/' . $layout_name . '.png';
});

// On hover
add_action('acf/input/admin_footer', 'acf_flexible_preview_on_hover');
function acf_flexible_preview_on_hover() {
    $flex_field = acf_get_field('page_builder');

    $layouts_map = [];
    if ($flex_field && isset($flex_field['layouts'])) {
        foreach ($flex_field['layouts'] as $layout) {
            $layouts_map[$layout['key']] = $layout['name'];
        }
    }
    ?>
    <style>
        .acf-fc-popup li {
        position: relative;
        }

        .acf-fc-preview-tooltip {
        position: absolute;
        top: 0;
        left: 100%;
        margin-left: 10px;;
        background: white;
        border: 1px solid #ccc;
        padding: 5px;
        z-index: 9999;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        display: none;
        width: 300px;
        }

        .acf-fc-preview-tooltip img {
        width: 100%;
        height: auto;
        display: block;
        }
    </style>
        <script>
        jQuery(document).ready(function($) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        const $popup = $(node).find('.acf-fc-popup').length ? $(node).find('.acf-fc-popup') : $(node);
                        if ($popup.hasClass('acf-fc-popup')) {
                            $popup.find('li').each(function() {
                                const $a = $(this).find('a[data-layout]');
                                const layout = $a.data('layout');
                                if (!layout || $(this).find('.acf-fc-preview-tooltip').length > 0) return;

                                const imgUrl = '<?php echo get_template_directory_uri(); ?>/acf-previews/' + layout + '.png';
                                const $tooltip = $('<div class="acf-fc-preview-tooltip"><img src="' + imgUrl + '" alt="Preview"></div>');
                                $(this).append($tooltip);

                                $(this).on('mouseenter', function() {
                                    $(this).find('.acf-fc-preview-tooltip').fadeIn(150);
                                }).on('mouseleave', function() {
                                    $(this).find('.acf-fc-preview-tooltip').fadeOut(100);
                                });
                            });
                        }
                    });
                });
            });

            observer.observe(document.body, { childList: true, subtree: true });
        });
    </script>
    <?php
}