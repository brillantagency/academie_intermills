<?php

/**********
 * ACF
 **********/

// Add ACF Option page
add_action( 'acf/init', 'my_acf_option_init' );
function my_acf_option_init() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Options générales',
				'menu_title' => 'Options générales',
				'redirect'   => false,
				'icon_url'   => 'dashicons-info',
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Archive Articles',    // Titre de la page
				'menu_title'  => 'Archive Articles',    // Titre du menu
				'menu_slug'   => 'archive-articles',    // Slug
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'parent_slug' => 'edit.php?post_type=article' // ← sous-menu du CPT
			)
		);

		acf_add_options_page(
				array(
				'page_title'  => 'Archive Evènements',    // Titre de la page
				'menu_title'  => 'Archive Evènements',    // Titre du menu
				'menu_slug'   => 'archive-evenements',    // Slug
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'parent_slug' => 'edit.php?post_type=event' // ← sous-menu du CPT
			)
		);
	}
}