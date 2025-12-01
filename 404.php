<?php 
require get_template_directory() . '/parts/html-header.php';
require get_template_directory() . '/parts/header.php';

$banner_suptitle = get_field('banner_suptitle', 'option');
$banner_title    = get_field('banner_title', 'option');
$banner_content  = get_field('banner_content', 'option');
$cta             = get_field('banner_button', 'option');
$cta_color       = 'primary';
?>

<main class="main page-404 p-top-bottom" role="main">
    <section class="banner_page text-align-center container p-top">
        <span class="banner_page_suptitle"><?php echo $banner_suptitle; ?></span>
        <div class="banner_page_title"><?php echo $banner_title; ?></div>
        <div><?php echo $banner_content; ?></div>
        <?php include(locate_template('parts/components/cta.php')); ?>
    </section>
</main>

<?php 
require get_template_directory() . '/parts/footer.php';
require get_template_directory() . '/parts/html-footer.php';
?>