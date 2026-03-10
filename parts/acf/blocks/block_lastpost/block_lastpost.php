<?php
$filename = pathinfo($file, PATHINFO_FILENAME);
enqueue_block_assets($filename);

$lastpost_select_news = get_sub_field('lastpost_select_news');
$lastpost_select_events = get_sub_field('lastpost_select_events');
$lastpost_post   = get_sub_field('lastpost_post');
$lastpost_title  = get_sub_field('lastpost_title');
$lastpost_text   = get_sub_field('lastpost_text');
$lastpost_link   = get_sub_field('lastpost_link');

// Styles
$lastpost_active     = get_sub_field('lastpost_active');
$lastpost_padding    = get_sub_field('lastpost_padding');
$lastpost_link_color = get_sub_field('lastpost_link_color');
$lastpost_layout     = get_sub_field('lastpost_layout');
$lastpost_id         = get_sub_field('lastpost_id'); 

if(empty($lastpost_title)) {
    $lastpost_title = get_field('lastpost_title', 'option');
}

if(empty($lastpost_text)) {
    $lastpost_text = get_field('lastpost_text', 'option');
}

if(empty($lastpost_link)) {
    $lastpost_link = get_field('lastpost_link', 'option');
}

$lastpost_select = '';
if($lastpost_post === 'event') {
    $lastpost_select = $lastpost_select_events;
    $post_type       = 'event';

} elseif($lastpost_post === 'article') {
    $lastpost_select = $lastpost_select_news;
    $post_type       = 'article';
}

if ($lastpost_select) {
    $args = [
        'post_type'      => $post_type,
        'post__in'       => wp_list_pluck($lastpost_select, 'ID'),
        'orderby'        => 'post__in',
        'order'          => 'DESC',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];
} else {
    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => 8,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
    ];
}

if($lastpost_layout) {
    $lastpost_layout = 'simple';
} else {
    $lastpost_layout = 'focus';
}

$post_query = new WP_Query($args);


$posts = $post_query->posts;

// Affiche le premier post séparément si layout focus
if ($lastpost_layout === 'focus' && !empty($posts)) {
    $first_post = array_shift($posts); // récupère et retire le premier post
    setup_postdata($first_post);
}

if ($post_query->have_posts() && $lastpost_active) :

?>
<section class="lastpost p-<?php echo $lastpost_padding; ?>" <?php echo !empty($lastpost_id)? 'id="' . $lastpost_id . '"' : ''; ?>>
    <div class="lastpost_layout lastpost_layout_<?php echo $lastpost_layout; ?>">
    <?php if(!empty($lastpost_title) || !empty($lastpost_content)): ?>
        <div class="lastpost_wrapper_content <?php echo !empty($lastpost_animation_media)? 'animatable-js animatable-' . $lastpost_animation_media : '' ?>">
            <div class="lastpost_wrapper_text">
                <?php if(!empty($lastpost_title)): ?>
                <h2 class="lastpost_title title"><?php echo $lastpost_title; ?></h2>
                <?php endif; ?>

                <?php if(!empty($lastpost_text)): ?>
                <div class="lastpost_text"><?php echo $lastpost_text; ?></div>
                <?php endif; ?>
            </div>

            <div class="lastpost_flex">
                
                <?php if($lastpost_layout === 'focus') :
                        $class_button_prev = 'lastpost_prev';
                        $class_button_next = 'lastpost_next';
                    ?>
                    <div class="lastpost_flex">
                        <?php include get_template_directory() . '/parts/components/swiper-nav.php'; ?>
                    </div>
                <?php endif; ?>

                <?php if(!empty($lastpost_link)):
                    $cta = $lastpost_link;
                    $cta_color = 'link';
                    $page_single = false;
                    include get_template_directory() . '/parts/components/cta.php';
                endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="lastpost_wrapper_post">
            <div class="swiper lastpost_slider_swiper-js">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        include get_template_directory() . '/parts/components/post/post.php';
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <?php if($lastpost_layout !== 'focus') : 
                    $class_button_prev = 'lastpost_prev';
                    $class_button_next = 'lastpost_next';
                    
                    include get_template_directory() . '/parts/components/swiper-nav.php'; 
                endif; ?>
            </div>
        </div>

        <?php if($lastpost_layout === 'focus') : ?>
        <div class="lastpost_wrapper_post_focus">
            <?php $post = $first_post; include get_template_directory() . '/parts/components/post/post.php'; wp_reset_postdata();?>
        </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>
