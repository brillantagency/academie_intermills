<?php
/*
Template Name: Archive Article
*/

require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

<main class="main archive archive_article" role="main">

    <?php 
    $banner_type = 'page';
    include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php'));

    if (have_posts()) :
        while (have_posts()) : the_post();
            include('parts/acf/acf_builder.php');
        endwhile; wp_reset_postdata();
    endif;
    ?>

    <div class="container p-both">
        <div class="archive_post_grid">

            <?php
            // Pagination
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // WP_Query pour le CPT 'article'
            $args = [
                'post_type'      => 'article',
                'posts_per_page' => 12,
                'paged'          => $paged,
            ];
            $articles_query = new WP_Query($args);

            if( $articles_query->have_posts() ):
                while( $articles_query->have_posts() ): $articles_query->the_post();
                    include get_template_directory() . '/parts/components/post/post.php';
                endwhile;

                wp_reset_postdata();
            else:
                echo '<p>' . __('Aucun article trouvé.', 'brillant') . '</p>';
            endif;
            ?>

        </div>
        <?php include get_template_directory() . '/parts/components/post/post_pagination_event_articles.php'; ?>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>
