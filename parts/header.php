<?php 
$company_logo_header = get_field('company_logo_header', 'option');
?>

<header class="header">
    <div class="header_container">
        <!-- Logo -->
        <a class="header_logo_link" href="<?php echo home_url(); ?>" title="<?php echo __('Logo Académie Intermills','brillant'); ?>">
            <?php if(!empty($company_logo_header['url'])) : ?>
                <img src="<?php echo $company_logo_header['url']; ?>" width="220" height="127" alt="<?php echo $company_logo_header['alt']; ?>">
            <?php endif; ?>
        </a>

        <!-- Navigation desktop -->
        <div class="header_nav_desktop">
            <?php $theme_location = 'topbar'; include(locate_template('parts/components/menu.php')); ?>
            <?php $theme_location = 'primary_menu'; include(locate_template('parts/components/menu.php')); ?>
        </div>

        <!-- Burger button (mobile only) -->
        <button class="burger_button burger_button-js" aria-label="Menu"><?php echo __('Menu', 'brillant'); ?></button>
    </div>

    <!-- Menu burger (mobile) -->
    <div class="header_nav_mobile menu_burger">
        <a class="header_logo_link" href="<?php echo home_url(); ?>" title="<?php echo __('Logo Académie Intermills','brillant'); ?>">
            <?php if(!empty($company_logo_header['url'])) : ?>
                <img src="<?php echo $company_logo_header['url']; ?>" width="220" height="127" alt="<?php echo $company_logo_header['alt']; ?>">
            <?php endif; ?>
        </a>
        <?php $theme_location = 'topbar'; include(locate_template('parts/components/menu.php')); ?>
        <?php $theme_location = 'primary_menu'; include(locate_template('parts/components/menu.php')); ?>
    </div>
</header>
