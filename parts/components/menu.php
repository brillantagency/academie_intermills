<div class="menu_burger_nav_wrapper">
    <?php 
    wp_nav_menu(array(
        'theme_location'  => $theme_location,
        'container'       => 'nav',
        'container_class' => 'menu_burger_nav_wp',
        'menu_class'      => 'main-menu',
        'fallback_cb'     => false,
    ));
    ?>
</div>