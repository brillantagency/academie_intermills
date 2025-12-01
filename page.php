<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
?>

<main class="main" role="main">
<?php 
include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); 

if (have_posts()) :
    while (have_posts()) : the_post();
        include('parts/acf/acf_builder.php');
    endwhile; wp_reset_postdata();
endif;
?>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>