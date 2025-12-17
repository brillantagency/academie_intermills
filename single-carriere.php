<?php 
    $banner_type              = 'single';
    $single_banner_title      = get_the_title();
    $single_banner_gallery    = get_field('carriere_thumbnail');
    $single_date              = get_the_date();
    $single_link_archive      = get_field('archive_link_carriere', 'option');
    $page_single              = true;
    $file                     = get_field('carriere_file_download');
    $lang                     = get_field('carriere_language');
    $company_contact_specific = get_field('company_contact');

    $company                  = get_field('carriere_select_company');
    if (!empty($company)) {
        $entreprise_id      = $company->ID;
        //$name               = get_the_title($entreprise_id);
        //$contact_thumbnail  = get_field('entreprise_contact_thumbnail', $entreprise_id);
    }

    if (!empty($company_contact_specific['mail'])) {
        $contact_mail = $company_contact_specific['mail'];
    } elseif(!empty($company)) {
        $contact_mail = get_field('entreprise_contact_mail', $entreprise_id);
    } else {
        $contact_mail = null;
    }

    if (!empty($company_contact_specific['name'])) {
        $contact_name = $company_contact_specific['name'];
    } elseif(!empty($company)) {
        $contact_name = get_field('entreprise_contact_name', $entreprise_id);
    } else {
        $contact_name = null;
    }

    if (!empty($company_contact_specific['phone'])) {
        $contact_phone = $company_contact_specific['phone'];
    } elseif(!empty($company)) {
        $contact_phone = get_field('entreprise_contact_phone', $entreprise_id);
    } else {
        $contact_name = null;
    }

    require get_template_directory() . '/parts/html-header.php';
    require get_template_directory() . '/parts/header.php';
?>

<main class="main single single_carriere" role="main">
    <?php include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); ?>

    <div class="container single_carriere_container p-top">
        <div>
            <?php 
            $post_terms = [];
            $taxonomies = ['type_opportunite', 'region', 'secteur', 'contrat'];

            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms(get_the_ID(), $taxonomy);
                if ($terms && !is_wp_error($terms)) {
                    $post_terms = array_merge($post_terms, $terms);
                }
            }
            include_once(locate_template('parts/components/post/post_term.php')); 
            ?>

            <?php echo the_content(); ?>

            <?php include_once(locate_template('parts/components/accordeons.php')); ?>
        </div>

        <div class="single_carriere_encart">
            <?php if(!empty($contact_name) or !empty($contact_mail) or !empty($contact_phone)) : ?>
            <div class="single_carriere_infos_contact">
                <p class="h3 single_carriere_infos_contact_title"><?php echo __('Information de contact', 'brillant'); ?></p>

                <?php if(!empty($contact_name)): ?>
                <p class="single_carriere_infos_contact_name">
                    <span><?php echo __('Nom de la personne de contact', 'brillant'); ?></span>
                    <?php echo $contact_name; ?>
                </p>
                <?php endif; ?>

                <?php if(!empty($contact_mail)): ?>
                <p class="single_carriere_infos_contact_mail">
                    <span><?php echo __('Email', 'brillant'); ?></span>
                    <a href="mailto:<?php echo $contact_mail; ?>"><?php echo $contact_mail; ?></a>
                </p>
                <?php endif; ?>

                <?php if(!empty($contact_phone)): ?>
                <p class="single_carriere_infos_contact_phone">
                    <span><?php echo __('Téléphone', 'brillant'); ?></span>
                    <a href="tel:<?php echo clean_phone_number($contact_phone); ?>"><?php echo $contact_phone; ?></a>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php 
                include_once(locate_template('parts/components/file_download.php'));

                $media       = get_field('carriere_video');
                $block_video = 'carriere'; 
                include_once(locate_template('parts/components/video_modal.php'));
            ?>

            <p class="single_date">
                <b><?php echo __('Date de diffusion', 'brillant'); ?></b><br>
                <?php echo $single_date; ?>
            </p>

            <?php if(!empty($lang)): ?>
                <p><?php echo $lang ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            include('parts/acf/acf_builder.php');
        endwhile; wp_reset_postdata();
    endif;
    ?>

</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>