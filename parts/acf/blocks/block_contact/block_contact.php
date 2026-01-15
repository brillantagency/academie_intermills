<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $contact_form              = get_sub_field('contact_form');
    $contact_title             = get_sub_field('contact_title');
    $contact_text              = get_sub_field('contact_text');
    $contact_link              = get_sub_field('contact_link');

    // General
    $contact_phone        = get_field('company_phone', 'option');
    $contact_mail         = get_field('company_mail', 'option');
    $contact_address      = get_field('company_address', 'option');
    $contact_address_link = get_field('company_address_link', 'option');

    // Styles
    $contact_padding           = get_sub_field('contact_padding');
    $contact_active            = get_sub_field('contact_active');
    $contact_animation_content = get_sub_field('contact_animation_content');
    $contact_id                = get_sub_field('contact_id'); 

    if($contact_active) :
?>

<section class="block_contact p-<?php echo $contact_padding; ?>" <?php echo !empty($contact_id)? 'id="' . $contact_id . '"' : ''; ?>>
    <div class="container <?php echo !empty($contact_form)? 'contact_container' : '' ?> <?php echo !empty($contact_animation_content)? 'animatable-js animatable-' . $contact_animation_content : '' ?>">
        <div class="contact_text_wrapper">
            <div class="contact_text_wrapper_header">
                <?php if(!empty($contact_title)) : ?>
                <h2 class="contact_title title">           
                    <?php echo $contact_title; ?>
                </h2>
                <?php endif; ?>

                <?php if(!empty($contact_text)) : ?>
                <div class="contact_text"><?php echo $contact_text; ?></div>
                <?php endif; ?>
            </div>


            <div class="contact_infos_wrapper">
                <?php if(!empty($contact_phone)) : ?>
                <a href="<?php echo phoneClean($contact_phone); ?>" class="contact_infos">
                    <span class="contact_infos_title"><?php echo __('Téléphone', 'brillant'); ?></span>
                    <span><?php echo $contact_phone; ?></span>
                </a>
                <?php endif; ?>

                <?php if(!empty($contact_mail)) : ?>
                <a href="mailto:<?php echo $contact_mail; ?>" class="contact_infos">
                    <span class="contact_infos_title"><?php echo __('Mail', 'brillant'); ?></span>
                    <span><?php echo $contact_mail; ?></span>
                </a>
                <?php endif; ?>

                <?php if(!empty($contact_address)) : ?>
                <a href="<?php echo $contact_address_link; ?>" target="_blank" rel="noopener noreferrer" class="contact_infos">
                    <span class="contact_infos_title"><?php echo __('Adresse', 'brillant'); ?></span>
                    <span><?php echo $contact_address; ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if(!empty($contact_form)) : ?>
            <div class="contact_form_wrapper">
                <?php echo do_shortcode($contact_form); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>