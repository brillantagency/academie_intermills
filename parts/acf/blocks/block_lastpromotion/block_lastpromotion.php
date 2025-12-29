<?php
$filename = pathinfo($file, PATHINFO_FILENAME);
enqueue_block_assets($filename);

$lastpost_promotion_select = get_sub_field('lastpost_promotion_select');
$lastpost_promotion_title  = get_sub_field('lastpost_promotion_title');
$lastpost_promotion_text   = get_sub_field('lastpost_promotion_text');
$lastpost_promotion_link   = get_sub_field('lastpost_promotion_link');

// Styles
$lastpost_promotion_active     = get_sub_field('lastpost_promotion_active');
$lastpost_promotion_padding    = get_sub_field('lastpost_promotion_padding');
$lastpost_promotion_link_color = get_sub_field('lastpost_promotion_link_color');

if(empty($lastpost_promotion_title)) {
    $lastpost_promotion_title = get_field('lastpost_promotion_title', 'option');
}

if(empty($lastpost_promotion_text)) {
    $lastpost_promotion_text = get_field('lastpost_promotion_text', 'option');
}

if(empty($lastpost_promotion_link)) {
    $lastpost_promotion_link = get_field('lastpost_promotion_link', 'option');
}

if ($lastpost_promotion_select) {
    $args = [
        'post_type'      => 'promotion',
        'post__in'       => wp_list_pluck($lastpost_promotion_select, 'ID'),
        'orderby'        => 'post__in',
        'order'          => 'ASC',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ];
} else {
    $args = [
        'post_type'      => 'promotion',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ];
}

$post_query = new WP_Query($args);

$posts = $post_query->posts;

$last_post_index = $post_query->post_count - 1;

if ($post_query->have_posts() && $lastpost_promotion_active) :

?>
<section class="lastpost_promotion container p-<?php echo $lastpost_promotion_padding; ?>">
    <?php if(!empty($lastpost_promotion_title) || !empty($lastpost_promotion_text)): ?>
    <div class="lastpost_promotion_wrapper_content">
        <div class="lastpost_promotion_wrapper_text">
            <?php if(!empty($lastpost_promotion_title)): ?>
            <h2 class="lastpost_promotion_title"><?php echo $lastpost_promotion_title; ?></h2>
            <?php endif; ?>

            <?php if(!empty($lastpost_promotion_text)): ?>
            <div class="lastpost_promotion_text"><?php echo $lastpost_promotion_text; ?></div>
            <?php endif; ?>
        </div>

        <div class="lastpost_promotion_link">
            <?php if(!empty($lastpost_promotion_link)):
                $cta = $lastpost_promotion_link;
                $cta_color = 'link';
                $page_single = false;
                include get_template_directory() . '/parts/components/cta.php';
            endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="lastpost_promotion_wrapper_post">
        <?php
        foreach ($posts as $index => $post) {
            if(($index === 4)) {
                $is_last = true;
            } else {
                $is_last = false;
            }

            include get_template_directory() . '/parts/components/post/post_promotion.php';
        }
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php endif; ?>