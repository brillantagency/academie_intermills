<?php
    $title      = get_the_title();
    $date       = get_the_date();
    $excerpt    = get_the_excerpt();
    $content    = get_the_content();
    $thumbnail  = get_field('post_thumbnail');
    $permalink  = get_permalink();

    $taxonomy = 'public';
    $post_terms = get_the_terms(get_the_ID(), $taxonomy);
    $terms_classes = '';

    if ($post_terms && !is_wp_error($post_terms)) {
        $slugs = wp_list_pluck($post_terms, 'slug');
        $terms_classes = implode(' ', $slugs);
    }
?>
<div class="swiper-slide post_card post_link-js post_active-js <?php echo esc_attr($terms_classes); ?>">
    <?php if(!empty($thumbnail)) : ?>
        <a href="<?php echo $permalink; ?>" class="post_card_img_wrapper">
            <img class="post_card_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" loading="lazy">
        </a>
    <?php endif; ?>

    <?php include(locate_template('parts/components/post/post_term.php')); ?>

    <?php if(!empty($title)) : ?>
    <h3 class="post_card_title"><?php echo $title; ?></h3>
    <?php endif; ?>

    <?php if(!empty($excerpt)) : ?>
    <p class="post_card_excerpt"><?php echo $excerpt; ?></p>
    <?php endif; ?>

    <div class="post_card_meta">
        <span class="post_card_date"><?php echo $date; ?></span>
        <?php if(!empty($permalink)): ?>
            <a href="<?php echo $permalink; ?>" class="post_card_readmore">
                <?php echo __('Lire plus', 'brillant') ?>
            </a>
        <?php endif; ?>
    </div>
</div>