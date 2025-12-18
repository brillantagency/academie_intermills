<?php
$filter_terms = get_terms([
    'taxonomy'   => $terms,
    'hide_empty' => true,
]);
?>

<div class="post_filter">
    <button class="post_filter_btn post_filter_btn-js active" data-filter="all">
        <?php _e('Tout', 'brillant'); ?>
    </button>

    <?php foreach ($filter_terms as $term): ?>
        <button class="post_filter_btn post_filter_btn-js" data-filter="<?php echo esc_attr($term->slug); ?>">
            <?php echo esc_html($term->name); ?>
        </button>
    <?php endforeach; ?>
</div>