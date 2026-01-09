<?php
    // Company Info
    $company_phone              = get_field('company_phone', 'option');
    $company_mail               = get_field('company_mail', 'option');
    $company_address            = get_field('company_address', 'option');
    $company_address_link       = get_field('company_address_link', 'option');
    $company_logo_footer        = get_field('company_logo_footer', 'option');
    $company_baseline           = get_field('company_baseline', 'option');

    // Footer
    $footer_logos               = get_field('footer_logos', 'option');
    $footer_link                = get_field('footer_link', 'option');
    $company_phone_clean        = clean_phone_number($company_phone);
?>

<footer class="footer">
    <div class="container">
        <div class="footer_top">
            <button role="button" class="cta cta_primary burger_button burger_button-js" aria-label="Menu">Menu</button>
            <div class="menu_burger">
                <?php $theme_location = 'topbar'; include(locate_template('parts/components/menu.php')); ?>
                <?php $theme_location = 'primary_menu'; include(locate_template('parts/components/menu.php')); ?>
                <?php include(locate_template('parts/components/social.php')); ?>
            </div>

            <?php $theme_location = 'primary_menu'; include(locate_template('parts/components/menu.php')); ?>

            <?php if(!empty($footer_link['url'])) : ?>
            <a href="<?php echo $footer_link['url']; ?>" target="<?php echo $footer_link['target']? '_blank' : '_self'; ?>" class="cta cta_primary"><?php echo $footer_link['title']; ?></a>
            <?php endif; ?>
        </div>
        
        <div class="footer_bottom">
            <div class="footer_bottom_company">
                <?php if(!empty($company_logo_footer['url']) or !empty($company_baseline)) : ?>
                    <div class="footer_bottom_company_logo">
                        <?php if(!empty($company_logo_footer['url'])) : ?>
                        <a class="footer_bottom_company_logo_link" title="<?php echo $company_logo_footer['alt']; ?>" href="<?php echo home_url(); ?>">
                            <img src="<?php echo $company_logo_footer['url']; ?>" width="320" height="170" alt="<?php echo $company_logo_footer['alt']; ?>" />
                        </a>
                        <?php endif; ?>

                        <?php if(!empty($company_baseline)) : ?>
                        <p><?php echo $company_baseline; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="footer_bottom_infos">
                    <?php if(!empty($company_phone) or !empty($company_mail) or !empty($company_address)) : ?>
                        <ul class="footer_bottom_infos_company">
                            <?php if(!empty($company_address)) : ?>
                            <li>
                                <?php if(!empty($company_address_link)) : ?>
                                    <a href="<?php echo $company_address_link; ?>" target="_blank" rel="noopener noreferrer">
                                        <?php echo $company_address; ?>
                                    </a>
                                <?php else : ?>
                                    <p><?php echo $company_address; ?></p>
                                <?php endif; ?>
                            </li>
                            <?php endif; ?>

                            <?php if(!empty($company_phone)) : ?>
                            <li><a href="tel:<?php echo $company_phone_clean; ?>"><?php echo $company_phone; ?></a></li>
                            <?php endif; ?>

                            <?php if(!empty($company_mail)) : ?>
                            <li><a href="mailto:<?php echo $company_mail?>"><?php echo $company_mail ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>

                        <div class="footer_bottom_infos_created">
                            <?php echo __('© Copyright', 'brillant'); ?> <?php the_time('Y'); ?> <?php include_once(locate_template('parts/components/designby.php')); ?>
                        </div>

                        <div class="footer_bottom_infos_legal">
                            <?php $theme_location = 'copyright_menu'; include(locate_template('parts/components/menu.php')); ?>
                            <button class="cky-banner-element"><?php echo __('Cookie', 'brillant'); ?></button>
                        </div>

                        <?php include(locate_template('parts/components/social.php')); ?>
                </div>

                <?php if(!empty($footer_logos)) : ?>
                <ul class="footer_bottom_logos">
                    <?php foreach($footer_logos as $logo) : 
                        $media_id = $logo['ID'];
                        $media_link = get_field('media_link', $media_id);
                    ?>
                    <li>
                        <?php if(!empty($media_link)) : ?>
                            <a href="<?php echo esc_url($media_link['url']); ?>" title="<?php echo $media_link['title']; ?>" target="<?php echo $media_link['target']? $media_link['target'] : '_self'; ?>">
                        <?php endif; ?>

                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">

                        <?php if(!empty($media_link)) : ?>
                            </a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>