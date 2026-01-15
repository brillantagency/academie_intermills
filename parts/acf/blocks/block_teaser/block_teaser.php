<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $teaser_title          = get_sub_field('teaser_title');
    $teaser_content        = get_sub_field('teaser_text');
    $teaser_link           = get_sub_field('teaser_link');

    //Styles
    $teaser_padding           = get_sub_field('teaser_padding'); 
    $teaser_active            = get_sub_field('teaser_active');
    $teaser_animation_content = get_sub_field('teaser_animation_content');
    $teaser_id                = get_sub_field('teaser_id'); 

    // video
    $media                    = get_sub_field('teaser_media_video_bool');
    $teaser_gallery           = get_sub_field('teaser_media_gallery');

    if(!empty($teaser_title) || !empty($teaser_content)) {
        $tag = 'section';
    } else {
        $tag = 'div';
    }

    if(!empty($teaser_gallery)) {
        $count = count($teaser_gallery);
        $video_cover = $teaser_gallery[0];
    } else {
        $video_cover = '';
    }

    if($teaser_active) :
?>

<<?php echo $tag; ?> class="teaser_section p-<?php echo $teaser_padding; ?>" <?php echo !empty($teaser_id)? 'id="' . $teaser_id . '"' : ''; ?>>
    <?php if(!empty($video_embed) or !empty($video_upload) or !empty($teaser_gallery)) : ?>
    <div class="teaser_wrapper teaser_media_wrapper <?php echo !empty($teaser_animation_content)? 'animatable-js animatable-' . $teaser_animation_content : '' ?>">
        <div class="teaser_media_media_wrapper">
        <?php if(!$media) : ?>
            <?php if ($count > 1) : ?>
                <div class="swiper teaser_swiper-js">
                    <div class="swiper-wrapper teaser_swiper-wrapper">
                        <?php foreach ($teaser_gallery as $image): ?>
                            <div class="swiper-slide">
                                <img loading="lazy"
                                    src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>"
                                    class="teaser_img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php include get_template_directory() . '/parts/components/swiper-nav.php'; ?>
                </div>
            <?php else : ?>
                <?php foreach($teaser_gallery as $index => $gallery) : ?>
                    <?php if(!empty($index === 0) or !empty($index === 1)) : ?>
                        <img loading="lazy" class="teaser_img <?php echo $index === 1? 'teaser_img_small': ''; ?>" src="<?php echo $gallery['url']; ?>" alt="<?php echo $gallery['alt']; ?>" >
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else :
            $block_video = 'teaser_';
            include get_template_directory() . '/parts/components/video.php';
        endif; ?>
        </div>



        <?php if(!empty($teaser_title) || !empty($teaser_content)): ?>
        <div class="teaser_wrapper <?php echo !empty($teaser_animation_media)? 'animatable-js animatable-' . $teaser_animation_media : '' ?> teaser_text_wrapper">

            <?php if(!empty($teaser_title)): ?>
            <h2 class="teaser_title title"><?php echo $teaser_title; ?></h2>
            <?php endif; ?>

            <?php if(!empty($teaser_content)): ?>
            <div class="teaser_text"><?php echo $teaser_content; ?></div>
            <?php endif; ?>

            <?php if(!empty($teaser_link)):
                $cta = $teaser_link;
                $cta_color = 'primary';
                include get_template_directory() . '/parts/components/cta.php';
            endif; ?>
        </div>
        <?php endif; ?>

    </div>
    <?php endif ?>
</<?php echo $tag; ?>>
<?php endif; ?>