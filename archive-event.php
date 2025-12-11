<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

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

    <div class="container">
        <div class="archive_post_grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php include get_template_directory() . '/parts/components/post/post.php'; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php echo __('Aucun événement trouvé.', 'brillant'); ?></p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <?php
                the_posts_pagination([
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18" fill="none">
                                    <path d="M1 1L9 9L1 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>',
                    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="18" viewBox="0 0 10 18" fill="none">
                                    <path d="M1 1L9 9L1 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>',
                ]);
            ?>
        </div>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>
