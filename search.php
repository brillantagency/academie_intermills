<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

<main class="main" role="main">
    <div class="container p-top">
        <h1><?php echo __('Résultats pour :', 'brillant'); ?> <?php echo get_search_query(); ?></h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p><?php echo __('Aucun résultat trouvé.', 'brillant'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>