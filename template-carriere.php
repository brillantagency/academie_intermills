<?php
/*
Template Name: Archive Carriere
*/

require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
$get_the_content = get_the_content();

?>

<main class="main archive archive_carriere" role="main">

    <?php
    // =========================
    // BANNIÈRE (ACF PAGE)
    // =========================
    $banner_type = 'page';
    include locate_template('parts/acf/blocks/block_banner/block_banner.php');
    ?>

    <?php if(!empty($get_the_content)) : ?>
    <div class="container p-both">
        <?php echo $get_the_content; ?>
    </div>
    <?php endif; ?>

    <div class="container container_carriere_filter p-bottom">
        <div class="archive_carriere_filter">
            <button id="button_filter_show" class="h3 archive_carriere_filter_title"><?php _e('Filtre', 'brillant'); ?></button>

            <form method="GET" id="form_filter" class="carriere-filters">

                <?php
                $filters = [
                    'type_opportunite' => __('Type', 'brillant'),
                    'region'           => __('Région', 'brillant'),
                    'secteur'          => __('Secteur', 'brillant'),
                    'contrat'          => __('Type de contrat', 'brillant'),
                ];

                foreach ($filters as $taxonomy => $label) :
                    $terms = get_terms([
                        'taxonomy'   => $taxonomy,
                        'hide_empty' => false,
                    ]);
                ?>
                    <div class="filter-group">
                        <h4><?php echo esc_html($label); ?></h4>

                        <?php foreach ($terms as $term) :
                            $checked = (!empty($_GET[$taxonomy]) && in_array($term->slug, (array) $_GET[$taxonomy])) ? 'checked' : '';
                        ?>
                            <label>
                                <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>[]" value="<?php echo esc_attr($term->slug); ?>" <?php echo $checked; ?>>
                                <?php echo esc_html($term->name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

                <button id="button_filter" type="submit" class="cta cta_primary">
                    <?php echo __('Filtrer', 'brillant'); ?>
                </button>
            </form>
        </div>

        <div class="archive_carriere_posts">
            <?php
            // =========================
            // WP_QUERY CARRIÈRE
            // =========================
            $tax_query = [];

            foreach (array_keys($filters) as $taxonomy) {
                if (!empty($_GET[$taxonomy])) {
                    $tax_query[] = [
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => (array) $_GET[$taxonomy],
                    ];
                }
            }

            if (count($tax_query) > 1) {
                $tax_query['relation'] = 'AND';
            }

            $args = [
                'post_type'      => 'carriere',
                'posts_per_page' => 6,
                'paged'          => max(1, get_query_var('paged')),
                'tax_query'      => $tax_query,
            ];

            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('parts/components/post/post_carriere'); ?>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

                <?php include locate_template('parts/components/post/post_pagination_event_articles.php'); ?>

            <?php else : ?>
                <p><?php echo __('Aucun résultat trouvé.', 'brillant'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    // =========================
    // ACF BUILDER (PAGE UNIQUE)
    // =========================
    $page_id = get_queried_object_id();

    if ($page_id) {
        $page = get_post($page_id);
        setup_postdata($page);

        include locate_template('parts/acf/acf_builder.php');

        wp_reset_postdata();
    }
    ?>

</main>

<?php
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>