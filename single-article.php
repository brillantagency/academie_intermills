<?php 
    $banner_type            = 'single';
    $single_banner_title    = get_the_title();
    $single_banner_gallery  = get_field('post_thumbnail');
    $single_date            = get_the_date();
    $file                   = get_field('post_download_file');
    $single_link_archive    = get_field('archive_link_article', 'option');
    $page_single            = true;

    require get_template_directory() . '/parts/html-header.php';
    require get_template_directory() . '/parts/header.php';
?>

<main class="main single single_article" role="main">
    <?php include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); ?>

    <div class="container single_container">
        <div class="single_infos">
            <?php if(!empty($single_link_archive)) : ?>
                <?php if(!empty($single_link_archive)):
                    $cta = $single_link_archive;
                    $cta_color = 'link';
                    include get_template_directory() . '/parts/components/cta.php';
                endif; ?>
            <?php endif; ?>

            <div class="single_wrapper_tags_download">
                <ul class="single_tags">
                    <li class="single_tag"></li>
                </ul>

                <?php include_once(locate_template('parts/components/file_download.php')); ?>
            </div>
        </div>
        <p class="single_date"><?php echo $single_date; ?></p>
        <?php echo the_content(); ?>

        <?php 
        $type_pagination = 'article';
        include_once(locate_template('parts/components/post/post_pagination.php')); ?>
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