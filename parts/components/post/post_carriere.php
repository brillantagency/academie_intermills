<?php
    $id          = get_the_ID();
    $title       = get_the_title();
    $date        = get_the_date();
    $excerpt     = get_the_excerpt();
    $permalink   = get_permalink();
    $thumbnail   = get_field('carriere_thumbnail');
    $media       = get_field('carriere_video');
    $video_embed = get_field('video_embed');
    $video_upload= get_field('video_upload');
    $file        = get_field('carriere_file_download');
    $lang        = get_field('carriere_language');
?>
<div class="post_card">
    <?php if(!empty($thumbnail)) : ?>
        <a href="<?php echo $permalink; ?>" class="post_card_img_wrapper">
            <img class="post_card_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" loading="lazy">
        </a>
    <?php endif; ?>

    <div class="post_card_content_wrapper">
        <div class="post_card_top">
            <?php if(!empty($title)) : ?>
            <h3 class="post_card_title"><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php 
            $post_terms = [];
            $taxonomies = ['type_opportunite', 'region', 'secteur', 'contrat'];
            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms(get_the_ID(), $taxonomy);
                if ($terms && !is_wp_error($terms)) {
                    $post_terms = array_merge($post_terms, $terms);
                }
            }
            include(locate_template('parts/components/post/post_term.php')); 
            ?>
        </div>

        <?php if(!empty($excerpt)) : ?>
        <p class="post_card_excerpt"><?php echo $excerpt; ?></p>
        <?php endif; ?>

        <div class="post_card_bottom">
            <?php if(!empty($permalink)): ?>
                <a href="<?php echo $permalink; ?>" class="post_card_readmore">
                    <?php echo __('Vers l\'offre', 'brillant') ?>
                </a>
            <?php endif; ?>

            <div class="post_card_bottom_infos">
                <span class="post_card_date"><?php echo $date; ?></span>

                <?php 
                $block_video = 'carriere'; include(locate_template('parts/components/video_modal.php'));
                include(locate_template('parts/components/file_download.php'));
                ?>

                <?php if(!empty($lang)): ?>
                    <p><?php echo $lang ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>