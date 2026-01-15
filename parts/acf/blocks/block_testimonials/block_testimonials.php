<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $testimonials_title   = get_sub_field('testimonials_title');
    $testimonials_text    = get_sub_field('testimonials_text');
    $testimonials_link    = get_sub_field('testimonials_link');
    $testimonials_select  = get_sub_field('testimonials_select');

    // Styles
    $testimonials_padding = get_sub_field('testimonials_padding');
    $testimonials_active   = get_sub_field('testimonials_active');
    $testimonials_id       = get_sub_field('testimonials_id'); 

    if(empty($testimonials_title)) {
        $testimonials_title = get_field('testimonials_title', 'option');
    } 
    if(empty($testimonials_text)) {
        $testimonials_text = get_field('testimonials_text', 'option');
    } 
    if(empty($testimonials_link)) {
        $testimonials_link = get_field('testimonials_link', 'option');
    } 

    if ($testimonials_select) {
        $args = [
            'post_type'      => 'temoignage',
            'post__in'       => wp_list_pluck($testimonials_select, 'ID'),
            'orderby'        => 'post__in',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ];
    } else {
        $args = [
            'post_type'      => 'temoignage',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ];
    }

    $testimonial_query = new WP_Query($args);

    if ($testimonial_query->have_posts()) :
?>
<section class="testimonials container p-<?php echo $testimonials_padding; ?>" <?php echo !empty($testimonials_id)? 'id="' . $testimonials_id . '"' : ''; ?>>
    <div class="testimonials_txt">
        <?php if (!empty($testimonials_title)) : ?>
            <h2 class="testimonials_title"><?php echo $testimonials_title; ?></h2>
        <?php endif; ?>
        <?php if (!empty($testimonials_text)) : ?>
            <p><?php echo $testimonials_text; ?></p>        
        <?php endif; ?>

        <?php if(!empty($testimonials_link)):
            $cta = $testimonials_link;
            $cta_color = 'primary';
            include get_template_directory() . '/parts/components/cta.php';
        endif; ?>
    </div>

    <div class="swiper testimonials_swiper testimonials_swiper-js">
        <div class="swiper-wrapper testimonials_swiper-wrapper">
            <?php while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                $name             = get_the_title();
                $note             = get_field('testimonials_note');
                $excerpt          = get_the_excerpt();
                $date             = get_the_date();
                $photo            = get_field('testimonials_image');
                $noteStars        = ''; 
                $max_stars        = 5;
                for ($i = 1; $i <= $max_stars; $i++) {
                    if ($i <= $note) {
                        $noteStars .= '★';
                    } else {
                        $noteStars .= '☆'; 
                    }
                }
            ?>  
            <div class="testimonials_slide swiper-slide">
                <div class="testimonials_slide_bull">
                    <?php if(!empty($note)) : ?>    
                        <span class="testimonials_slide_author_note"><?php echo $noteStars; ?></span>
                    <?php endif; ?>

                    <?php if(!empty($excerpt)) : ?>    
                        <span class="testimonials_slide_author_excerpt"><?php echo $excerpt; ?></span>
                    <?php endif; ?>
                </div>
                <div class="testimonials_slide_author">
                    <?php if(!empty($photo)) : ?>
                    <div class="testimonials_slide_author_img">
                        <img class="testimonials_slide_img" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" width="46" height="46">
                    </div>
                    <?php endif; ?>

                    <div >
                        <?php 
                        $taxonomy = 'public';
                        $post_terms = get_the_terms(get_the_ID(), $taxonomy);

                        include(locate_template('parts/components/post/post_term.php')); 
                        ?>

                        <?php if(!empty($name)) : ?>
                            <h3 class="testimonials_slide_author_name"><?php echo $name; ?></h3>
                        <?php endif; ?>

                        <p class="testimonials_slide_author_date"><?php echo $date; ?></p>
                    </div>
                </div>
                <?php if(!empty($testimonials_speak)) : ?>
                    <p><?php echo $testimonials_speak; ?></p>
                <?php endif; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php include get_template_directory() . '/parts/components/swiper-nav.php'; ?>
    </div>
</section>
<?php endif; ?>