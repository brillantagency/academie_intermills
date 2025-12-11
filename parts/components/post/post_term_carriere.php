<?php
// Taxonomy
$taxonomies = ['type_opportunite', 'region', 'secteur', 'contrat'];
$all_terms = [];

foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if ($terms && !is_wp_error($terms)) {
        $all_terms = array_merge($all_terms, $terms);
    }
}

if (!empty($all_terms)) : ?>
    <div class="post_card_terms">
        <?php foreach ($all_terms as $term) : ?>
            <span class="post_card_term"><?php echo esc_html($term->name); ?></span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>