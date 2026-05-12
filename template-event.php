<?php
/*
Template Name: Archive Event
*/

require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
$get_the_content = get_the_content();

?>

<main class="main archive archive_event" role="main">

    <?php 
    $banner_type = 'page';
    include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); ?>

    <?php if(!empty($get_the_content)) : ?>
    <div class="container p-both">
        <?php echo $get_the_content; ?>
    </div>
    <?php endif; ?>

    <?php if (have_posts()) :
        while (have_posts()) : the_post();
            include('parts/acf/acf_builder.php');
        endwhile; wp_reset_postdata();
    endif;
    ?>

    <div class="container p-both">
        <?php 
            $terms = 'public';
            include(locate_template('parts/components/post/post_filter.php'));
        ?>
        <div class="archive_post_grid">

            <?php
            // Pagination
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // WP_Query pour le CPT 'event'
            $args = [
                'post_type'      => 'event',
                'posts_per_page' => 12,
                'paged'          => $paged,
            ];
            $query = new WP_Query($args);

            if( $query->have_posts() ):
                while( $query->have_posts() ): $query->the_post();
                    include get_template_directory() . '/parts/components/post/post.php';
                endwhile;

                wp_reset_postdata();

            else:
                echo '<p>' . __('Aucun évènement trouvé.', 'brillant') . '</p>';
            endif;
            ?>
        </div>
        <?php include get_template_directory() . '/parts/components/post/posts_pagination.php'; ?>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>
