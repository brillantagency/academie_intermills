<?php

    $expertises = get_terms([
        'taxonomy' => 'expertises',
        'hide_empty' => true, // seulement celles qui sont utilisées
    ]);

?>

<div class="project_filter">
    <button class="project_filter_btn project_filter_btn-js active" data-filter="all"><?php echo __('Tous', 'brillant'); ?></button>

    <?php foreach ($expertises as $expertise) { ?>
       <button class="project_filter_btn project_filter_btn-js" data-filter="<?php echo esc_attr($expertise->slug) ?>"><?php echo esc_html($expertise->name); ?></button>
    <?php } ?>
</div>