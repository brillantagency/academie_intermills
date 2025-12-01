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
	}
}