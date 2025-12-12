<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $text_media_title          = get_sub_field('text_media_title');
    $text_media_content        = get_sub_field('text_media_text');
    $text_media_link           = get_sub_field('text_media_link');

    //Styles
    $text_media_link_color        = get_sub_field('text_media_link_color');
    $text_media_position          = get_sub_field('text_media_position'); 
    $text_media_padding           = get_sub_field('text_media_padding'); 
    $text_media_text_align        = get_sub_field('text_media_text_align'); 
    $text_media_active            = get_sub_field('text_media_active');
    $text_media_img_full          = get_sub_field('text_media_img_fullwidth');
    $text_media_content_width     = get_sub_field('text_media_content_width');
    $text_media_animation_content = get_sub_field('text_media_animation_content');
    $text_media_animation_media   = get_sub_field('text_media_animation_media');
    $text_media_bg_color_text     = get_sub_field('text_media_bg_color_text');

    $media                        = get_sub_field('text_media_media_video_bool');
    $text_media_gallery           = get_sub_field('text_media_media_gallery');

    if($text_media_bg_color_text === 'red') {
        $text_media_bg_color_text = 'text_media_bg_color_text text_media_bg_color_text_red';
    } elseif($text_media_bg_color_text === 'dark') {
        $text_media_bg_color_text = 'text_media_bg_color_text text_media_bg_color_text_dark';
    } elseif($text_media_bg_color_text === 'lightgrey') {
        $text_media_bg_color_text = 'text_media_bg_color_text text_media_bg_color_text_lightgrey';
    } else {
        $text_media_bg_color_text = '';
    }

    if(!empty($text_media_gallery)) {
        $count = count($text_media_gallery);
        $video_cover = $text_media_gallery[0];
    } else {
        $video_cover = '';
    }

    if(!empty($text_media_title) || !empty($text_media_content)) {
        $tag = 'section';
    } else {
        $tag = 'div';
    }

    if($text_media_active) :
?>

<<?php echo $tag; ?> class="text_media_section p-<?php echo $text_media_padding; ?> text_media_section_<?php echo $text_media_position; ?>">
    <div class="<?php echo $text_media_img_full ? '' : 'container'; ?> text_media_position text_media_position_<?php echo $text_media_position; ?> text_media_text_width_<?php echo $text_media_content_width; ?> <?php echo $text_media_bg_color_text ?>">
        <?php if(!empty($video_embed) or !empty($video_upload) or !empty($text_media_gallery)) : ?>
        <div class="text_media_wrapper text_media_media_wrapper <?php echo !empty($text_media_animation_content)? 'animatable-js animatable-' . $text_media_animation_content : '' ?>">
            <?php if(!$media) : ?>
                <?php if ($count > 2) : ?>
                    <div class="swiper text_media_swiper-js">
                        <div class="swiper-wrapper text_media_swiper-wrapper">
                            <?php foreach ($text_media_gallery as $image): ?>
                                <div class="swiper-slide text_media_img_wrapper">
                                    <img loading="lazy"
                                        src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>"
                                        class="text_media_img">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php include get_template_directory() . '/parts/components/swiper-nav.php'; ?>
                    </div>
                <?php else : ?>
                    <?php foreach($text_media_gallery as $index => $gallery) : ?>
                        <?php if(!empty($index === 0) or !empty($index === 1)) : ?>
                            <div class="text_media_img_wrapper">
                                <img loading="lazy" class="text_media_img <?php echo $index === 1? 'text_media_img_small': ''; ?>" src="<?php echo $gallery['url']; ?>" alt="<?php echo $gallery['alt']; ?>" >
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else :
                $block_video = 'text_media_';
                include get_template_directory() . '/parts/components/video.php';
            endif; ?>
        </div>
        <?php endif ?>

        <?php if(!empty($text_media_title) || !empty($text_media_content)): ?>
        <div class="text_media_wrapper <?php echo !empty($text_media_animation_media)? 'animatable-js animatable-' . $text_media_animation_media : '' ?> text_media_text_wrapper text_media_text_wrapper_align_<?php echo $text_media_text_align; ?>">

            <?php if(!empty($text_media_title)): ?>
            <h2 class="text_media_title title"><?php echo $text_media_title; ?></h2>
            <?php endif; ?>

            <?php if(!empty($text_media_content)): ?>
            <div class="text_media_text"><?php echo $text_media_content; ?></div>
            <?php endif; ?>

            <?php if(!empty($text_media_link)):
                $cta = $text_media_link;
                $cta_color = $text_media_link_color;
                $page_single = false;
                include get_template_directory() . '/parts/components/cta.php';
            endif; ?>
        </div>
        <?php endif; ?>
    </div>
</<?php echo $tag; ?>>
<?php endif; ?>