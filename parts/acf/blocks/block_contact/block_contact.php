<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $contact_form              = get_sub_field('contact_form');
    $contact_title             = get_sub_field('contact_title');
    $contact_text              = get_sub_field('contact_text');
    $contact_link              = get_sub_field('contact_link');


    if(empty($contact_title)) {
        $map_title = get_field('contact_title', 'option');
    } 
    if(empty($contact_text)) {
        $map_text = get_field('contact_text', 'option');
    } 
    if(empty($contact_link)) {
        $map_cta = get_field('contact_link', 'option');
    } 

    // Styles
    $contact_padding           = get_sub_field('contact_padding');
    $contact_active            = get_sub_field('contact_active');
    $contact_animation_content = get_sub_field('contact_animation_content');

    if($contact_active) :
?>

<section class="block_contact p-<?php echo $contact_padding; ?>">
    <div class="container <?php echo !empty($contact_animation_content)? 'animatable-js animatable-' . $contact_animation_content : '' ?>">
        <div class="contact_text_wrapper">
            <?php if(!empty($contact_title)) : ?>
            <h2 class="contact_title title">           
                <?php echo $contact_title; ?>
            </h2>
            <?php endif; ?>

            <?php if(!empty($contact_text)) : ?>
            <div class="contact_text"><?php echo $contact_text; ?></div>
            <?php endif; ?>
        </div>

        <?php if(!empty($contact_form)) : ?>
            <div class="contact_form_wrapper">
                <?php echo do_shortcode($contact_form); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>