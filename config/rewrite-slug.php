<?php
function custom_post_permalink() {
    global $wp_post_types;

    $wp_post_types['post']->rewrite = array(
        'slug'       => 'article',
        'with_front' => false,
    );
}
add_action('init', 'custom_post_permalink');