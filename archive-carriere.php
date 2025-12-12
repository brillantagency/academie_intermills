<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

<main class="main archive archive_carriere" role="main">
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

    <div class="container container_carriere_filter p-both">
        <div class="archive_carriere_filter">
            <h3><?php echo __('Filtre', 'brillant'); ?></h3>
            <form method="GET" class="carriere-filters">
                <div class="filter-group">
                    <h4><?php echo __('Type', 'brillant'); ?></h4>
                    <?php
                    $types = get_terms(['taxonomy' => 'type_opportunite', 'hide_empty' => false]);
                    foreach ($types as $type) {
                        $checked = isset($_GET['type_opportunite']) && in_array($type->slug, (array) $_GET['type_opportunite']) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='type_opportunite[]' value='{$type->slug}' $checked> {$type->name}</label>";
                    }
                    ?>
                </div>

                <div class="filter-group">
                    <h4><?php echo __('Région','brillant'); ?></h4>
                    <?php
                    $regions = get_terms(['taxonomy' => 'region', 'hide_empty' => false]);
                    foreach ($regions as $region) {
                        $checked = isset($_GET['region']) && in_array($region->slug, (array) $_GET['region']) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='region[]' value='{$region->slug}' $checked> {$region->name}</label>";
                    }
                    ?>
                </div>

                <div class="filter-group">
                    <h4><?php echo __('Secteur', 'brillant'); ?></h4>
                    <?php
                    $secteurs = get_terms(['taxonomy' => 'secteur', 'hide_empty' => false]);
                    foreach ($secteurs as $secteur) {
                        $checked = isset($_GET['secteur']) && in_array($secteur->slug, (array) $_GET['secteur']) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='secteur[]' value='{$secteur->slug}' $checked> {$secteur->name}</label>";
                    }
                    ?>
                </div>

                <div class="filter-group">
                    <h4><?php echo __('Type de contrat', 'brillant'); ?></h4>
                    <?php
                    $contrats = get_terms(['taxonomy' => 'contrat', 'hide_empty' => false]);
                    foreach ($contrats as $contrat) {
                        $checked = isset($_GET['contrat']) && in_array($contrat->slug, (array) $_GET['contrat']) ? 'checked' : '';
                        echo "<label><input type='checkbox' name='contrat[]' value='{$contrat->slug}' $checked> {$contrat->name}</label>";
                    }
                    ?>
                </div>

                <button type="submit" class="cta cta_primary"><?php echo __('Filtrer'); ?></button>
            </form>
        </div>
        <div class="archive_carriere_posts">
            <?php
            $tax_query = [];

            foreach (['type', 'region', 'secteur', 'contrat'] as $taxonomy) {
                if (!empty($_GET[$taxonomy])) {
                    $tax_query[] = [
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => (array) $_GET[$taxonomy],
                    ];
                }
            }

            $args = [
                'post_type' => 'carriere',
                'posts_per_page' => 6,
                'paged' => get_query_var('paged') ?: 1,
            ];

            if (!empty($tax_query)) {
                $args['tax_query'] = $tax_query;
            }

            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php include get_template_directory() . '/parts/components/post/post_carriere.php'; ?>
                <?php endwhile; ?>

                <?php include get_template_directory() . '/parts/components/post/posts_pagination.php'; ?>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php echo __('Aucun résultat trouvé.', 'brillant'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>
