<?php
$filename = pathinfo($file, PATHINFO_FILENAME);
enqueue_block_assets($filename);

$breakingnews_suptitle   = get_sub_field('breakingnews_suptitle');
$breakingnews_title      = get_sub_field('breakingnews_title');
$breakingnews_content    = get_sub_field('breakingnews_text');
$breakingnews_link       = get_sub_field('breakingnews_link');
$selected_tax            = get_sub_field('breakingnews_select_tax');

if(empty($breakingnews_title)) {
    $breakingnews_title = get_field('breakingnews_title', 'option');
}

// Styles
$breakingnews_active  = get_sub_field('breakingnews_active');
$breakingnews_padding = get_sub_field('breakingnews_padding');
$breakingnews_id      = get_sub_field('breakingnews_id'); 

$post_fields = [
    'breakingnews_select_post_orientation',
    'breakingnews_select_post_formations',
    'breakingnews_select_alternance',
    'breakingnews_select_emploi',
];

$posts_to_show = [];

foreach( $post_fields as $field_name ) {
    $selected_posts = get_sub_field($field_name); // <-- ici get_field car Post Object au niveau du bloc

    if( $selected_posts ) {
        $selected_posts = is_array($selected_posts) ? $selected_posts : [$selected_posts];
        $posts_to_show = array_merge($posts_to_show, $selected_posts);
    }
}

// Si aucun post n'a été sélectionné, fallback sur la taxonomie
if( empty($posts_to_show) && !empty($selected_tax) ) {
    $args = [
        'post_type' => 'carriere',
        'posts_per_page' => -1,
        'tax_query' => [[
            'taxonomy' => 'type_opportunite',
            'field'    => 'term_id',
            'terms'    => $selected_tax,
        ]],
    ];

    $query = new WP_Query($args);
    if( $query->have_posts() ) {
        $posts_to_show = $query->posts;
    }
    wp_reset_postdata();
}


if ($breakingnews_active) :
?>
<div class="breakingnews p-<?php echo $breakingnews_padding; ?>" <?php echo !empty($breakingnews_id)? 'id="' . $breakingnews_id . '"' : ''; ?>>
    <div class="container">
        <?php if(!empty($breakingnews_suptitle) or !empty($breakingnews_title) or !empty($breakingnews_link) or !empty($breakingnews_content)): ?>
        <div class="breakingnews_header">
            <?php if(!empty($breakingnews_suptitle) or !empty($breakingnews_title)): ?>
            <h2 class="breakingnews_title">
                <?php if(!empty($breakingnews_suptitle)) :?>
                <span class="breakingnews_title_sup"><?php echo $breakingnews_suptitle; ?></span>
                <?php endif; ?>

                <?php echo $breakingnews_title; ?>
            </h2>
            <?php endif; ?>

            <?php if(!empty($breakingnews_content)): ?>
            <div class="breakingnews_text"><?php echo $breakingnews_content; ?></div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if( !empty($posts_to_show) ) : ?>
        <div class="swiper breakingnews_swiper">
            <div class="breakingnews_nav">
                <?php 
                    $class_button_prev = 'breakingnews_prev';
                    $class_button_next = 'breakingnews_next';
                    include get_template_directory() . '/parts/components/swiper-nav.php'; 
                ?>
            </div>
            <div class="swiper-wrapper">
                <?php foreach ( $posts_to_show as $post ) :
                    setup_postdata($post);
                    $title     = get_the_title($post);
                    $excerpt   = get_the_excerpt($post);
                    $thumbnail = get_field('carriere_thumbnail');
                    $cta       = get_permalink($post);
                ?>
                <div class="swiper-slide breakingnews_slide">

                    <?php if(!empty($thumbnail)) : ?>
                        <div class="breakingnews_img_wrapper">
                            <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>">
                        </div>
                    <?php endif; ?>

                    <div class="breakingnews_content">
                        <?php if(!empty($title)) : ?>
                        <p class="breakingnews_heading"><?php echo $title; ?></p>
                        <?php endif; ?>

                        <?php if(!empty($excerpt)) : ?>
                        <p class="breakingnews_description"><?php echo $excerpt; ?></p>
                        <?php endif; ?>

                        <?php if(!empty($cta)):
                            $cta = $cta;
                            $page_single = false;
                            $cta_color = 'link';
                            include get_template_directory() . '/parts/components/cta.php';
                        endif; ?>
                    </div>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
