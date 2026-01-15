<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);

    $listing_title   = get_sub_field('listing_title');

    //Styles
    $listing_padding  = get_sub_field('listing_padding'); 
    $listing_active   = get_sub_field('listing_active');
    $listing_id      = get_sub_field('listing_id'); 

    if(empty($listing_title)) {
        $listing_title = get_field('listing_title', 'option');
    }

    if(!empty($listing_title)) {
        $tag = 'section';
    } else {
        $tag = 'div';
    }

    $args = [
        'post_type'      => 'entreprise',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ];

    $post_query = new WP_Query($args);

    if ($post_query->have_posts() && $listing_active) :
?>

<<?php echo $tag; ?> class="listing_section container p-<?php echo $listing_padding; ?>" <?php echo !empty($listing_id)? 'id="' . $listing_id . '"' : ''; ?>>

    <?php if(!empty($listing_title)): ?>
    <h2 class="listing_title h3"><?php echo $listing_title; ?></h2>
    <?php endif; ?>

    <form class="listing_select_form">
        <select id="listing_select">
            <?php foreach ($post_query->posts as $post) : 
                setup_postdata($post); 
                $slug  = $post->post_name;   
                $title = get_the_title();    
            ?>
                <option value="<?php echo $slug; ?>"><?php echo $title; ?></option>
            <?php endforeach; wp_reset_postdata(); ?>
        </select>
    </form>

    <table class="listing listing_table">
        <thead>
            <tr>
            <th><?php echo __('SOCIÉTÉ', 'brillant'); ?></th>
            <th><?php echo __('CONTACT', 'brillant'); ?></th>
            <th><?php echo __('TÉLÉPHONE', 'brillant'); ?></th>
            <th><?php echo __('EMAIL','brillant');?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($post_query->posts as $post) : 
                setup_postdata($post);
                $slug          = $post->post_name;    
                $title         = get_the_title();    
                $contact_mail  = get_field('entreprise_contact_mail');    
                $contact_phone = get_field('entreprise_contact_phone');    
                $thumbnail     = get_field('entreprise_contact_thumbnail');    
                $contact_name  = get_field('entreprise_contact_name');    
            ?>
                <tr data-value="<?php echo $slug; ?>" class="listing_company_row">
                    <?php if(!empty($title) or !empty($thumbnail)) : ?>
                    <td class="listing_company_row_title">
                        <?php if(!empty($thumbnail)) : ?>
                        <div class="listing_img_wrapper">
                            <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>">
                        </div>
                        <?php endif; ?>
                        
                        <?php echo $title; ?>
                    </td>
                    <?php endif; ?>

                    <?php if(!empty($contact_name)) : ?>
                    <td class="listing_company_row_name"><?php echo $contact_name; ?></td>
                    <?php endif; ?>

                    <?php if(!empty($contact_phone)) : ?>
                    <td class="listing_company_row_phone"><a href="tel:<?php echo clean_phone_number($contact_phone); ?>"><?php echo $contact_phone; ?></a></td>
                    <?php endif; ?>

                    <?php if(!empty($contact_mail)) : ?>
                    <td class="listing_company_row_mail"><a href="mailto:<?php echo $contact_mail; ?>"><?php echo $contact_mail; ?></a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; wp_reset_postdata(); ?>
        </tbody>
    </table>

</<?php echo $tag; ?>>
<?php endif; ?>