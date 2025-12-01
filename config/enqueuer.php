<?php

function starkers_script_enqueuer() {
    ### JS ###
    // jQuery natif WP → déplacé en footer
    wp_deregister_script('jquery'); // désenregistrement de la version par défaut gérée par Wordpress
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
    wp_enqueue_script('jquery');

    // GSAP et plugins dans le footer
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js', array(), '3.5.1', true);
    wp_enqueue_script('motionPath-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/MotionPathPlugin.min.js', array('gsap-js'), '3.10.4', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.2', true);

    // Scripts du thème dépendant de jQuery et GSAP
    wp_enqueue_script('app-js', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery','gsap-js','motionPath-js'), '2.0.0', true);

    ### CSS ###
    wp_enqueue_style( 'bases-css', get_stylesheet_directory_uri() . '/dist/css/bases.min.css', array(), '1.0.0', 'screen' );
}

add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );


function enqueue_block_assets($block_name) {
    $dir = get_template_directory() . '/parts/acf/blocks/' . $block_name;
    $uri = get_template_directory_uri() . '/parts/acf/blocks/' . $block_name;

    // CSS
    if (file_exists($dir . '/' . $block_name . '.min.css')) {
        wp_enqueue_style(
            $block_name . '-css',
            $uri . '/' . $block_name . '.min.css',
            [],
            filemtime($dir . '/' . $block_name . '.min.css'),
            false
        );
    }

    // JS
    if (file_exists($dir . '/' . $block_name . '.min.js')) {
        wp_enqueue_script(
            $block_name . '-js',
            $uri . '/' . $block_name . '.min.js',
            ['jquery'],
            filemtime($dir . '/' . $block_name . '.min.js'),
            true
        );
    }
}
