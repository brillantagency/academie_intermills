<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';
$get_the_content = get_the_content();
?>

<main class="homepage main" role="main">
<?php 
$banner_type = 'homepage';
include_once(locate_template('parts/acf/blocks/block_banner/block_banner.php')); ?>

<?php if(!empty($get_the_content)) : ?>
<div class="container p-both">
    <?php echo $get_the_content; ?>
</div>
<?php endif; ?>

<?php if (have_posts()) :
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