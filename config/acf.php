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

		/*acf_add_options_page(
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
				'page_title'  => 'Archive Evènements',
				'menu_title'  => 'Archive Evènements',
				'menu_slug'   => 'archive-evenements',
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'parent_slug' => 'edit.php?post_type=event'
			)
		);

		acf_add_options_page(
			array(
				'page_title'  => 'Archive Carrières',
				'menu_title'  => 'Archive Carrières',
				'menu_slug'   => 'archive-carrieres',
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'parent_slug' => 'edit.php?post_type=carriere'
			)
		);*/
	}
}