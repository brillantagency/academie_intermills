<?php 
    $banner_type            = 'single';
    $single_banner_title    = get_the_title();
    $single_banner_gallery  = get_field('carriere_thumbnail');
    $single_date            = get_the_date();
    $single_link_archive    = get_field('archive_link_carriere', 'option');
    $page_single            = true;
    $media                  = get_field('carriere_video');
    $file                   = get_field('carriere_file_download');
    $lang                   = get_field('carriere_language');

    require get_template_directory() . '/parts/html-header.php';
    require get_template_directory() . '/parts/header.php';
?>

<main class="main single single_carriere" role="main">
    <?php include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); ?>

    <div class="container single_carriere_container p-top">
        <div>
            <?php include_once(locate_template('parts/components/post/post_term_carriere.php')); ?>

            <?php echo the_content(); ?>

            <?php include_once(locate_template('parts/components/accordeons.php')); ?>
        </div>

        <div class="single_carriere_encart">
            <?php /*if(!empty($text_media_link)):
                $cta = $text_media_link;
                $cta_color = $text_media_link_color;
                $page_single = false;
                include get_template_directory() . '/parts/components/cta.php';
            endif;*/ ?>

            <div class="single_carriere_infos_contact">
                <p class="h3"><?php echo __('Information de contact', 'brillant'); ?></p>
            </div>

            <?php 
                include_once(locate_template('parts/components/file_download.php'));

                $block_video = 'carriere'; include_once(locate_template('parts/components/play_video.php'));
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