<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

<main class="main archive archive_promotion" role="main">
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

    <div class="container p-both">
        <div class="archive_post_grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php include get_template_directory() . '/parts/components/post/post_promotion.php'; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php echo __('Aucun événement trouvé.', 'brillant'); ?></p>
            <?php endif; ?>
        </div>

        <?php include get_template_directory() . '/parts/components/post/posts_pagination.php'; ?>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>
