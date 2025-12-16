<?php 
function cpt_temoignages() {
    $labels = array(
        'name'               => 'Témoignages',
        'singular_name'      => 'Temoignage',
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
        'show_in_admin_bar'  => true,
        'rewrite'            => array('slug' => 'temoignages'),
        'show_in_rest'       => true,
        'publicly_queryable' => true, // no de single page and remove URL on admin in single page
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'          => 'dashicons-editor-quote',
    );

    register_post_type('temoignage', $args);
}
add_action('init', 'cpt_temoignages');


function cpt_event() {
    $labels = array(
        'name'               => 'Évènements',
        'singular_name'      => 'Évènement',
        'menu_name'          => 'Évènements',
        'name_admin_bar'     => 'Évènements',
        'add_new'            => 'Ajouter un nouveau évènement',
        'add_new_item'       => 'Ajouter un nouveau évènement',
        'new_item'           => 'Nouvel événement',
        'edit_item'          => 'Modifier l\'évènement',
        'view_item'          => 'Voir l\'évènement',
        'all_items'          => 'Tous les évènements',
        'search_items'       => 'Rechercher des évènements',
        'not_found'          => 'Aucun évènement trouvé',
        'not_found_in_trash' => 'Aucun évènement dans la corbeille'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_admin_bar'  => true,
        'rewrite'            => array(
            'slug'       => 'evenements-1',
            'with_front' => false,
            'pages'      => true,
        ),
        'show_in_rest'       => true,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon'          => 'dashicons-editor-quote',
    );

    register_post_type('event', $args);
}
add_action('init', 'cpt_event');










function cpt_carriere() {

    $labels = array(
        'name'               => 'Carrières',
        'singular_name'      => 'Carrière',
        'menu_name'          => 'Carrières',
        'name_admin_bar'     => 'Carrière',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une nouvelle carrière',
        'new_item'           => 'Nouvelle carrière',
        'edit_item'          => 'Modifier la carrière',
        'view_item'          => 'Voir la carrière',
        'all_items'          => 'Toutes les carrières',
        'search_items'       => 'Rechercher des carrières',
        'not_found'          => 'Aucune carrière trouvée',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'carriere-1'),
        'show_in_rest'       => true,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon'          => 'dashicons-businessman',
    );

    register_post_type('carriere', $args);
}
add_action('init', 'cpt_carriere');













// ----------- CPT Articles -----------
function cpt_article() {
    $labels = [
        'name'          => 'Articles',
        'singular_name' => 'Article',
        'add_new_item'  => 'Ajouter un nouvel article',
        'edit_item'     => 'Modifier l’article',
        'all_items'     => 'Tous les articles',
    ];

    $args = [
        'label'             => 'Articles',
        'labels'            => $labels,
        'public'            => true,
        'has_archive'       => true,
        'menu_position'     => 5,
        'show_in_admin_bar' => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'rewrite'           => ['slug' => 'actualites-1'],
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    ];

    register_post_type('article', $args);
}
add_action('init', 'cpt_article');

// ----------- Supprimer le menu "Articles" par défaut -----------
function remove_default_posts_menu() {
    remove_menu_page('edit.php'); // Supprime "Articles" du menu admin
}
add_action('admin_menu', 'remove_default_posts_menu');












function cpt_promotions() {
    $labels = [
        'name'          => 'Promotions',
        'singular_name' => 'Promotion',
        'add_new_item'  => 'Ajouter une nouvelle promotion',
        'edit_item'     => 'Modifier la promotion',
        'all_items'     => 'Tous les promotions',
    ];
    $args = [
        'label'             => 'Promotions',
        'labels'            => $labels,
        'public'            => true,
        'has_archive'       => true,
        'menu_position'      => 5,
        'show_in_admin_bar' => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'rewrite'           => ['slug' => 'promotions-1'],
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    ];
    register_post_type('promotion', $args);
}
add_action('init', 'cpt_promotions');



function cpt_entreprises() {
    $labels = [
        'name'          => 'Entreprises',
        'singular_name' => 'Entreprise',
        'add_new_item'  => 'Ajouter une nouvelle entreprise',
        'edit_item'     => 'Modifier la entreprise',
        'all_items'     => 'Tous les entreprises',
    ];
    $args = [
        'label'             => 'Entreprises',
        'labels'            => $labels,
        'public'            => true,
        'has_archive'       => false,
        'menu_position'      => 5,
        'show_in_admin_bar' => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'rewrite'           => ['slug' => 'entreprises'],
        'show_in_rest'      => true,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    ];
    register_post_type('entreprise', $args);
}
add_action('init', 'cpt_entreprises');