<?php 
    $args = [
        'post_type'      => 'event',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
    ];
    
    $events_object_query = new WP_Query($args);
if ($events_object_query->have_posts()) :
?>

<?php include(locate_template('parts/components/event_filter.php')); ?>

<section class="template_events container p-top-bottom">
    <?php while ($events_object_query->have_posts()) : $events_object_query->the_post();
        $id       = get_the_ID();
        $link     = get_the_permalink();
        $title    = get_the_title();
        $subtitle = get_field('event_subtitle');
        $image    = get_field('event_media_image');
        $logo     = get_field('event_logo');
        $video    = get_field('event_media_video_bool');

        // video
        $media          = true;
        $video_embed    = get_field('event_media_video_embed');
        $video_upload   = get_field('event_media_video_upload');
        $video_autoplay = false;
        $video_loop     = false;
        $video_control  = false;
        $video_cover    = '';

        $expertises = get_the_terms($id, 'expertises');

        $expertise_classes = '';

        if ($expertises && !is_wp_error($expertises)) {
            $expertise_slugs = wp_list_pluck($expertises, 'slug');
            $expertise_classes = implode(' ', $expertise_slugs);
        }

        include(locate_template('parts/components/event_object.php'));

    endwhile; wp_reset_postdata(); ?>
</section>
<?php endif; ?>