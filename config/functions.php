<?php 

function clean_phone_number($phone) {
    // Supprimer tout sauf chiffres et "+" en début
    $phone = trim($phone);
    $phone = preg_replace('/[^0-9\+]/', '', $phone);

    // Si le "+" n'est pas au début, on le supprime
    if (strpos($phone, '+') > 0) {
        $phone = str_replace('+', '', $phone);
    }

    return $phone;
}

// Pagination before/after post article (single page)
function get_adjacent_article($direction = 'next') {
    $current_id   = get_the_ID();
    $current_date = get_the_date('Y-m-d H:i:s', $current_id);

    $args = array(
        'post_type'      => 'article',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'post__not_in'   => array($current_id),
        'date_query'     => array()
    );

    // direction du tri
    if ($direction === 'next') {
        $args['order'] = 'ASC';
        $args['date_query'][] = array('after' => $current_date);
    } else {
        $args['order'] = 'DESC';
        $args['date_query'][] = array('before' => $current_date);
    }

    return new WP_Query($args);
}


// Pagination before/after post event (single page)
function get_adjacent_event($direction = 'next') {
    $current_id   = get_the_ID();
    $current_date = get_the_date('Y-m-d H:i:s', $current_id);

    $args = array(
        'post_type'      => 'event',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'post__not_in'   => array($current_id),
        'date_query'     => array()
    );

    // direction du tri
    if ($direction === 'next') {
        $args['order'] = 'ASC';
        $args['date_query'][] = array('after' => $current_date);
    } else {
        $args['order'] = 'DESC';
        $args['date_query'][] = array('before' => $current_date);
    }

    return new WP_Query($args);
}