<?php
$filename = pathinfo($file, PATHINFO_FILENAME);
enqueue_block_assets($filename);

$promotion_repeater = get_field('promotion');

if (empty($promotion_repeater)) {
    $promotion_repeater = get_field('promotion', 'option');
}

$promotion_active  = get_sub_field('promotion_active');
$promotion_padding = get_sub_field('promotion_padding');

if ($promotion_active) :
?>
<div class="promotion_block p-<?php echo $promotion_padding; ?>">
    <div class="container">
        <div class="promotion_intro">
            <h2 class="promotion_title">Promotion</h2>
            <p class="promotion_subtitle">avec formulaire sur la page dédiée + pdf téléchargeable</p>
            <p class="promotion_text">
                <?php echo get_sub_field('promotion_description'); ?>
            </p>
        </div>

        <?php if (!empty($promotion_repeater)) : ?>
        <div class="promotion_gallery">
            <?php foreach ($promotion_repeater as $promo) : ?>
            <div class="promotion_item">
                <?php if (!empty($promo['image'])) : ?>
                <div class="promotion_image">
                    <img src="<?php echo $promo['image']['url']; ?>" alt="<?php echo $promo['image']['alt']; ?>" />
                </div>
                <?php endif; ?>

                <?php if (!empty($promo['caption'])) : ?>
                <p class="promotion_caption"><?php echo $promo['caption']; ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="promotion_description_block">
            <h3><?php echo get_sub_field('description_title'); ?></h3>
            <p><?php echo get_sub_field('description_text'); ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
