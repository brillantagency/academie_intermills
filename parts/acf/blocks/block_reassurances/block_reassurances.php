<?php
    $filename = pathinfo($file, PATHINFO_FILENAME);
    enqueue_block_assets($filename);
    
    $reassurances_repeater  = get_sub_field('reassurances');

    if(empty($reassurances_repeater)) {
        $reassurances_repeater = get_field('reassurances', 'option');
    }

    // Styles
    $reassurances_active   = get_sub_field('reassurances_active');
    $reassurances_padding  = get_sub_field('reassurances_padding');

    if($reassurances_active) :
?>

<div class="reassurances p-<?php echo $reassurances_padding; ?>">
    <div class="container">
        <?php if(!empty($reassurances_repeater)) : ?>
        <div class="reassurances_list">
        <?php foreach($reassurances_repeater as $rea) : ?>
            <div class="reassurances_item">
                <?php if(!empty($rea['number']) or !empty($rea['text'])) : ?>
                <p class="reassurances_number" data-target="<?php echo $rea['number']; ?>">0</p>
                <?php endif; ?>

                <?php if(!empty($rea['text'])) : ?>
                    <p class="reassurances_text"><?php echo $rea['text']; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>