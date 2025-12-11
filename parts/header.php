<?php 
$company_logo_header = get_field('company_logo_header', 'option');
?>

<header class="header">
    <div class="header_container container">
        <a class="header_logo_link" title="<?php echo __('Logo Coach2','brillant'); ?>" href="<?php echo home_url(); ?>">
            <?php if(!empty($company_logo_header['url'])) : ?>
                <img src="<?php echo $company_logo_header['url']; ?>" width="220" height="127" alt="<?php echo $company_logo_header['alt']; ?>">
            <?php endif; ?>
        </a>


        <div class="menu_wrapper">
            <!-- Burger Mobile -->
            <div class="burger_all_content">
                <button role="button" class="burger_button burger_button-js"><?php echo __('Menu', 'brillant'); ?></button>

                <div class="menu_burger">
                    <div class="menu_burger_wrapper_nav">
                        <button role="button" class="menu_burger_button_close menu_close-js"><?php echo __('Fermé', 'brillant'); ?></button>
                        <div class="menu_burger_nav_wrapper">
                            <?php $theme_location = 'topbar'; include(locate_template('parts/components/menu.php')); ?>
                            <?php $theme_location = 'menu_primary'; include(locate_template('parts/components/menu.php')); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Desktop -->
            <nav class="menu_nav">
                <?php //$theme_location = 'topbar'; include(locate_template('parts/components/menu.php')); ?>
                <?php //$theme_location = 'menu_primary'; include(locate_template('parts/components/menu.php')); ?>
            </nav>
        </div>
    </div>
</header>