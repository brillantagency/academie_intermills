<?php
// Taxonomy
$all_terms = [];

foreach ($taxonomies as $taxonomy) {
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    if ($terms && !is_wp_error($terms)) {
        $all_terms = array_merge($all_terms, $terms);
    }

    if($all_terms) {
        if($all_terms[0]->slug === 'entreprises') {
            $tag_class = 'tag_post_entreprise';
        } elseif($all_terms[0]->slug === 'jeunes-enseignants') {
            $tag_class = 'tag_post_jeune';
        } else {
            $tag_class = '';
        }
    }

}

if (!empty($all_terms)) :
?>
    <div class="post_card_terms">
        <?php foreach ($all_terms as $term) : ?>
            <span class="post_card_term <?php echo $tag_class; ?>"><?php echo esc_html($term->name); ?></span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>