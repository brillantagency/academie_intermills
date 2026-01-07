<?php
    if( is_post_type_archive() ) {
        $option = 'option';
    } else {
        $option = null;
    }

    $banner_title       = get_field('banner_title', $option);
    $banner_content     = get_field('banner_content', $option);
    $banner_suptitle    = get_field('banner_suptitle', $option);
    $banner_search_bool = get_field('banner_search_bool', $option);
    $ctas               = get_field('banner_buttons', $option);
    $banner             = true;

    // video
    $media                  = get_field('banner_media_video_bool', $option);
    $video_embed            = get_field('banner_media_video_embed', $option);
    $video_upload           = get_field('banner_media_video_upload', $option);
    $video_autoplay         = get_field('banner_media_video_autoplay', $option);
    $video_loop             = get_field('banner_media_video_loop', $option);
    $video_control          = get_field('banner_media_video_control', $option);
    $banner_gallery         = get_field('banner_media_gallery', $option);
    $banner_bg_color        = get_field('banner_bg_color', $option);


    if(!$media && empty($banner_gallery)) {
        if ($banner_bg_color === 'darkred') {
            $banner_bg_color = 'banner_bg banner_bg_darkred';
        }
        elseif($banner_bg_color === 'darkgreen') {
            $banner_bg_color = 'banner_bg banner_bg_darkgreen';
        }
    }

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
    
    <div class="banner_wrapper banner_wrapper_media <?php echo $banner_bg_color; ?>">
        <?php if(!$media && !empty($banner_gallery)) : ?>
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
        <?php elseif($media && ($video_embed || $video_upload)) :
            include get_template_directory() . '/parts/components/video.php';
        endif; ?>

        <div class="container">
            <div class="banner_wrapper_content">
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



                <?php if($banner_type === 'homepage' && $banner_search_bool) {
                    include(locate_template('parts/components/searchbar.php')); 
                } else {
                    if(!empty($ctas)) {
                        foreach($ctas as $cta):
                            $cta_color = 'primary';

                            include(locate_template('parts/components/cta.php')); 
                        endforeach;
                    }
                } ?>
            </div>
        </div>
    </div>
</section>