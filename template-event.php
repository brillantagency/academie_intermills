<?php
/*
Template Name: Archive Events
*/
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php'; ?>


<main class="main archive archive_event" role="main">
    <?php 
    $banner_type = 'page';
    include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php'));
    ?>

    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post();
            include('parts/acf/acf_builder.php');
        endwhile; wp_reset_postdata();
    endif;
    ?>

    <div class="container archive_post_grid">
        <?php include locate_template('archive-event.php'); ?>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>