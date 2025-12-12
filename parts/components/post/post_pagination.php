<?php 

$next_post = academie_get_adjacent_post($type_pagination, 'next'); // define on single page
$prev_post = academie_get_adjacent_post($type_pagination, 'prev');

$label_next = get_field('link_previous_' . $type_pagination, 'option');
$label_prev = get_field('link_next_' . $type_pagination, 'option');

?>

<div class="post_pagination">
    <?php if ($prev_post->have_posts()): 
        while ($prev_post->have_posts()) : $prev_post->the_post();?>
        <a class="post_pagination_link post_pagination_link_prev"  href="<?php echo get_permalink(); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="15" viewBox="0 0 37 15" fill="none">
                <path d="M0.292893 8.07113C-0.0976295 7.6806 -0.0976296 7.04744 0.292892 6.65691L6.65685 0.292951C7.04738 -0.0975733 7.68054 -0.0975734 8.07107 0.292951C8.46159 0.683475 8.46159 1.31664 8.07107 1.70716L2.41422 7.36402L8.07107 13.0209C8.46159 13.4114 8.46159 14.0446 8.07107 14.4351C7.68055 14.8256 7.04738 14.8256 6.65686 14.4351L0.292893 8.07113ZM37 7.36401L37 8.36401L1 8.36402L1 7.36402L1 6.36402L37 6.36401L37 7.36401Z" fill="#BCBCBC"/>
            </svg>
            <?php echo $label_prev; ?>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php if($next_post->have_posts()) :
        while ($next_post->have_posts()) : $next_post->the_post();?>
        <a class="post_pagination_link post_pagination_link_next"  href="<?php echo get_permalink(); ?>">
            <?php echo $label_next; ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="15" viewBox="0 0 37 15" fill="none">
                <path d="M0.292893 8.07113C-0.0976295 7.6806 -0.0976296 7.04744 0.292892 6.65691L6.65685 0.292951C7.04738 -0.0975733 7.68054 -0.0975734 8.07107 0.292951C8.46159 0.683475 8.46159 1.31664 8.07107 1.70716L2.41422 7.36402L8.07107 13.0209C8.46159 13.4114 8.46159 14.0446 8.07107 14.4351C7.68055 14.8256 7.04738 14.8256 6.65686 14.4351L0.292893 8.07113ZM37 7.36401L37 8.36401L1 8.36402L1 7.36402L1 6.36402L37 6.36401L37 7.36401Z" fill="#BCBCBC"/>
            </svg>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>
</div>