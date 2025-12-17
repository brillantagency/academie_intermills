<?php
if ($post_terms && !is_wp_error($post_terms)) :

?>
    <div class="post_card_terms">
        <?php foreach ($post_terms as $term) :

            $tag_class = '';

            if ($term->slug === 'entreprises') {
                $tag_class = 'tag_post_entreprise';
            } elseif ($term->slug === 'jeunes-enseignants') {
                $tag_class = 'tag_post_jeune';
            }
        ?>
            <span class="post_card_term <?php echo esc_attr($tag_class); ?>">
                <?php echo esc_html($term->name); ?>
            </span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
