<?php
    $id          = get_the_ID();
    $title       = get_the_title();
    $date        = get_the_date();
    $excerpt     = get_the_excerpt();
    $permalink   = get_permalink();
    $thumbnail   = get_field('post_thumbnail');
    $media       = get_field('post_video');
    $file        = get_field('post_file_download');
    $lang        = get_field('post_language');

    if(isset($is_last) && $is_last === true) {
        $is_last = true;
    } else {
        $is_last = false;
    }
?>
<div class="post_card">
    <?php if(!empty($thumbnail && !$is_last)) : ?>
        <a href="<?php echo $permalink; ?>" class="post_card_img_wrapper">
            <img class="post_card_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" loading="lazy">
        </a>
    <?php endif; ?>

    <div class="post_card_content_wrapper">
        <div class="post_card_top">
            <?php if(!empty($title)) : ?>
            <h3 class="post_card_title"><?php echo $title; ?></h3>
            <?php endif; ?>
        </div>

        <?php if(!empty($excerpt && $is_last)) : ?>
        <p class="post_card_excerpt"><?php echo $excerpt; ?></p>
        <?php endif; ?>

        <div class="post_card_bottom">
            <?php if(!empty($permalink)): ?>
                <a href="<?php echo $permalink; ?>" class="post_card_readmore">
                    <?php echo __('Vers l\'action', 'brillant') ?>
                </a>
            <?php endif; ?>

            <div class="post_card_bottom_infos">
                <?php 
                include(locate_template('parts/components/file_download.php'));
                ?>
            </div>
        </div>
    </div>
</div>