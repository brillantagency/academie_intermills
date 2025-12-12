<?php
    $title      = get_the_title();
    $date       = get_the_date();
    $excerpt    = get_the_excerpt();
    $content    = get_the_content();
    $thumbnail  = get_field('post_thumbnail');
    $permalink  = get_permalink();
?>
<div class="swiper-slide post_card">
    <?php if(!empty($thumbnail)) : ?>
        <div class="post_card_img_wrapper">
            <img class="post_card_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" loading="lazy">
        </div>
    <?php endif; ?>

    <?php
    $taxonomies = ['public'];
    include(locate_template('parts/components/post/post_term.php')); ?>

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