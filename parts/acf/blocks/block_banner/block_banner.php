<?php
    $banner_title    = get_field('banner_title');
    $banner_content  = get_field('banner_content');
    $banner_suptitle = get_field('banner_suptitle');
    $cta             = get_field('banner_button');
    $cta_color       = 'primary';

    // video
    $media                  = get_field('banner_media_video_bool');
    $video_embed            = get_field('banner_media_video_embed');
    $video_upload           = get_field('banner_media_video_upload');
    $video_autoplay         = get_field('banner_media_video_autoplay');
    $video_loop             = get_field('banner_media_video_loop');
    $video_control          = get_field('banner_media_video_control');
    $banner_gallery         = get_field('banner_media_gallery');

    if($banner_type === 'single') {
        if(empty($banner_title)) {
            $banner_title = $single_banner_title;
        }
        if (empty($banner_gallery) || !is_array($banner_gallery) || count($banner_gallery) === 0) {
            $banner_gallery = [$single_banner_gallery];
        }
    } else {
        $page_single = false;
    }


    if(!empty($banner_gallery) && is_array($banner_gallery)) {
        $count = count($banner_gallery);
    }
?>

<section class="banner p-top banner_<?php echo $banner_type; //Define on the page ?>">
    
    <?php if(!empty($video_embed) or !empty($video_upload) or !empty($banner_gallery)) : ?>
    <div class="banner_wrapper banner_wrapper_media">
        <?php if(!$media) : ?>
                <div class="swiper banner_swiper-js">
                    <div class="swiper-wrapper banner_swiper-wrapper">
                        <?php foreach ($banner_gallery as $image): ?>
                            <div class="swiper-slide img_wrapper_crop_form">
                                <img loading="lazy"
                                    src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>"
                                    class="banner_img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($count > 1) :
                    $class_button_prev = 'banner_prev';
                    $class_button_next = 'banner_next';
                    include get_template_directory() . '/parts/components/swiper-nav.php';
                    endif; ?>
                </div>
        <?php else :
            include get_template_directory() . '/parts/components/video.php';
        endif; ?>

        <div class="container">
            <div class="banner_wrapper banner_wrapper_content">
                <?php
                    if($banner_type === 'single') {
                        if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
                            rank_math_the_breadcrumbs();
                        }
                    }
                ?>

                <?php if(!empty($banner_suptitle)) : ?>
                <span class="banner_suptitle subtitle"><?php echo $banner_suptitle; ?></span>
                <?php endif; ?>

                <h1 class="banner_title">
                    <?php echo $banner_title; ?>
                </h1>

                <?php if(!empty($banner_content)) : ?>
                <div><?php echo $banner_content; ?></div>
                <?php endif; ?>

                <?php
                
                include(locate_template('parts/components/cta.php')); ?>

                
                <?php if($banner_type === 'homepage') {
                    include(locate_template('parts/components/searchbar.php')); 
                } ?>
            </div>
        </div>
    </div>
    <?php endif ?>
</section>