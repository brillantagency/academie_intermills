<?php 
/*
function cpt_temoignages() {
    $labels = array(
        'name'               => 'Témoignages',
        'singular_name'      => 'temoignage',
        'menu_name'          => 'Témoignages',
        'name_admin_bar'     => 'Témoignages',
        'add_new'            => 'Ajouter un nouveau',
        'add_new_item'       => 'Ajouter un nouveau témoignage',
        'new_item'           => 'Nouveau témoignage',
        'edit_item'          => 'Modifier le témoignage',
        'view_item'          => 'Voir le témoignage',
        'all_items'          => 'Tous les temoignages',
        'search_items'       => 'Rechercher des temoignages',
        'not_found'          => 'Aucun témoignage trouvé',
        'not_found_in_trash' => 'Aucun témoignage dans la corbeille'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'temoignages'),
        'show_in_rest'       => true,
        'publicly_queryable' => true, // no de single page and remove URL on admin in single page
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'          => 'dashicons-editor-quote',
    );

    register_post_type('temoignage', $args);
}
add_action('init', 'cpt_temoignages');


function taxo_marques() {
    $labels = array(
        'name'              => 'Marques',
        'singular_name'     => 'Marque',
        'search_items'      => 'Rechercher des marques',
        'all_items'         => 'Toutes les marques',
        'parent_item'       => 'Marque parente',
        'parent_item_colon' => 'Marque parente :',
        'edit_item'         => 'Modifier la marque',
        'update_item'       => 'Mettre à jour la marque',
        'add_new_item'      => 'Ajouter une nouvelle marque',
        'new_item_name'     => 'Nom de la nouvelle marque',
        'menu_name'         => 'Marques',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'marque'),
    );

    register_taxonomy('marque', array('temoignage'), $args);
}
add_action('init', 'taxo_marques');


function cpt_team() {
    $labels = array(
        'name'               => 'Team',
        'singular_name'      => 'Team',
        'menu_name'          => 'Team',
        'name_admin_bar'     => 'Team',
        'add_new'            => 'Ajouter un nouveau',
        'add_new_item'       => 'Ajouter un nouveau membre',
        'new_item'           => 'Nouveau membre',
        'edit_item'          => 'Modifier le membre',
        'view_item'          => 'Voir le membre',
        'all_items'          => 'Tous les membres',
        'search_items'       => 'Rechercher des membres',
        'not_found'          => 'Aucun membre trouvé',
        'not_found_in_trash' => 'Aucun membre dans la corbeille'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => false,
        'rewrite'            => array('slug' => 'equipe'),
        'publicly_queryable' => true,
        'supports'           => array('title', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'          => 'dashicons-admin-users',
    );

    register_post_type('team', $args);
}
add_action('init', 'cpt_team');


function cpt_services() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'name_admin_bar'     => 'Services',
        'add_new'            => 'Ajouter un service',
        'add_new_item'       => 'Ajouter un nouveau service',
        'new_item'           => 'Nouveau service',
        'edit_item'          => 'Modifier l\'service',
        'view_item'          => 'Voir l\'service',
        'all_items'          => 'Tous les services',
        'search_items'       => 'Rechercher des services',
        'not_found'          => 'Aucun service trouvé',
        'not_found_in_trash' => 'Aucun service dans la corbeille'
    );

    register_taxonomy('services', ['team'], [
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'rewrite' => ['slug' => 'services'],
        'show_admin_column' => true,
    ]);

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_in_rest'       => true,
        'supports'           => array('title', 'custom-fields', 'excerpt'),
        'menu_icon'          => 'dashicons-shield',
    );

    register_post_type('services', $args);
}
add_action('init', 'cpt_services');
*/