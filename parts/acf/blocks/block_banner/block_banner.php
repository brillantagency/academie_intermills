<?php
    $banner_suptitle = get_field('banner_suptitle');
    $banner_title    = get_field('banner_title');
    $banner_content  = get_field('banner_content');
    $cta             = get_field('banner_button');

    // Styles
    $banner_padding  = get_field('banner_padding');
    $cta_color       = get_field('banner_button_color');

    // video
    $media                  = get_sub_field('banner_video_bool');
    $video_embed            = get_sub_field('banner_video_embed');
    $video_upload           = get_sub_field('banner_video_upload');
    $video_autoplay         = get_sub_field('banner_video_autoplay');
    $video_loop             = get_sub_field('banner_video_loop');
    $video_control          = get_sub_field('banner_video_control');
    $text_media_gallery     = get_sub_field('banner_gallery');
?>

<section class="banner p-<?php echo $banner_padding; ?>">
    
    <?php if(!empty($video_embed) or !empty($video_upload) or !empty($text_media_gallery)) : ?>
    <div class="text_media_wrapper text_media_media_wrapper <?php echo !empty($text_media_animation_content)? 'animatable-js animatable-' . $text_media_animation_content : '' ?> <?php echo $text_media_img_rotate? 'text_media_wrapper_rotate' : '' ; ?>">
        <?php if(!$media) : ?>
            <?php if ($count > 2) : ?>
                <div class="swiper text_media_swiper-js">
                    <div class="swiper-wrapper text_media_swiper-wrapper">
                        <?php foreach ($text_media_gallery as $image): ?>
                            <div class="swiper-slide img_wrapper_crop_form">
                                <img loading="lazy"
                                    src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>"
                                    class="text_media_img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php else : ?>
                <?php foreach($text_media_gallery as $index => $gallery) : ?>
                    <?php if(!empty($index === 0) or !empty($index === 1)) : ?>
                        <div class="img_wrapper_crop_form <?php echo $index === 1? 'img_wrapper_crop_form_border' : ''; ?>">
                            <img loading="lazy" class="text_media_img <?php echo $index === 1? 'text_media_img_small': ''; ?>" src="<?php echo $gallery['url']; ?>" alt="<?php echo $gallery['alt']; ?>" >
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else :
            include get_template_directory() . '/parts/components/video.php';
        endif; ?>
    </div>
    <?php endif ?>


    <div class="container">
        <?php if(!empty($banner_suptitle)) : ?>
        <span class="banner_suptitle subtitle"><?php echo $banner_suptitle; ?></span>
        <?php endif; ?>

        <h1 class="banner_title">
            <?php echo $banner_title; ?>
        </h1>

        <?php if(!empty($banner_content)) : ?>
        <div><?php echo $banner_content; ?></div>
        <?php endif; ?>

        <?php include(locate_template('parts/components/cta.php')); ?>
    </div>
</section>