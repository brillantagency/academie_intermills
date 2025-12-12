<?php
function tax_type_opportunite() {
    $labels = array(
        'name'          => 'Types',
        'singular_name' => 'Type',
    );

    register_taxonomy('type_opportunite', 'carriere', array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'type'),
    ));
}
add_action('init', 'tax_type_opportunite');


function tax_region() {

    register_taxonomy('region', 'carriere', array(
        'label'             => 'Régions',
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'region'),
    ));
}
add_action('init', 'tax_region');


function tax_secteur() {

    register_taxonomy('secteur', 'carriere', array(
        'label'             => 'Secteurs',
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'secteur'),
    ));
}
add_action('init', 'tax_secteur');

function tax_contrat() {

    register_taxonomy('contrat', 'carriere', array(
        'label'             => 'Types de contrat',
        'hierarchical'      => false, // Ex : temps plein / temps partiel etc.
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'contrat'),
    ));
}
add_action('init', 'tax_contrat');


function tax_public() {

    register_taxonomy('public', ['article', 'temoignage', 'event'], array(
        'label'             => 'Public',
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'public'),
    ));
}
add_action('init', 'tax_public');