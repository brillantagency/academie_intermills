<?php

// Register menus
function register_my_menu() {
	register_nav_menus(
		array(
			'topbar'         => 'Top bar Menu',
			'copyright_menu' => 'Copyright Menu',
			'primary_menu'   => 'Primary Menu',
		)
	);
}
add_action( 'init', 'register_my_menu' );