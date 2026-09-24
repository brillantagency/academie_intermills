<?php
$filename = pathinfo($file, PATHINFO_FILENAME);
enqueue_block_assets($filename);

$form_shortcode  = get_sub_field('form_shortcode');

// Styles
$form_active     = get_sub_field('form_active');
$form_padding    = get_sub_field('form_padding');
$form_id         = get_sub_field('form_id'); 

if ($form_active) :
?>
<section class="block_form container p-<?php echo $form_padding; ?>" <?php echo !empty($form_id)? 'id="' . $form_id . '"' : ''; ?>>
    <?php echo do_shortcode($form_shortcode); ?>
</section>
<?php endif; ?>