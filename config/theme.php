<?php

/** Allow SVG through WordPress Media Uploader */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );



// Clean phone number
function phoneClean($number) {
	$number = str_replace(array('/', ' ', '(', ')'), "", $number);
	if(substr($number, 0 , 2) == "04" || substr($number, 0 , 2) == "08") {
		$newNum = preg_replace('/^(?:\+?0|0)?/','+32', $number);
	} else if(substr($number, 0 , 2) == "00") {
		$newNum = preg_replace('/^(?:\+?00|0)?/','+', $number);
	} else{
		$newNum = $number;
	}
	   
	return $newNum;
}

function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect'); // ajoute le menu Formats dans les champs wysiwyg
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Ajouter des styles personnalisés à TinyMCE (ACF WYSIWYG)
function add_class($init_array) {

    // Définit les styles disponibles
    $style_formats = array(
        array(
            'title' => 'Text darkblue',
            'inline' => 'span',
            'classes' => 'text_color_darkblue',
            'wrapper' => false,
        ),
        array(
            'title' => 'Text yellow',
            'inline' => 'span',
            'classes' => 'text_color_yellow',
            'wrapper' => false,
        ),
        array(
            'title' => 'Text orange',
            'inline' => 'span',
            'classes' => 'text_color_orange',
            'wrapper' => false,
        ),
        array(
            'title' => 'Text blue',
            'inline' => 'span',
            'classes' => 'text_color_blue',
            'wrapper' => false,
        ),
    );

    $init_array['style_formats'] = json_encode($style_formats);
    //$init_array['block_formats'] = 'Paragraphe=p;Titre H2=h2;Titre H3=h3;Titre H4=h4;Titre H5=h5;Titre H6=h6';

    return $init_array;
}
add_filter('tiny_mce_before_init', 'add_class');