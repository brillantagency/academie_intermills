<?php 
    $accordeons_repeater = get_field('carriere_accordeons');

    if(!empty($accordeons_repeater)) : 
?>

<div class="accordeons_repeater">
    <?php foreach($accordeons_repeater as $accordeon) :  ?>
    <div class="accordeon active">
        <?php if(!empty($accordeon['title'])) : ?>
        <button role="button" class="h4 accordeon_button accordeons_button-js">
            <?php echo $accordeon['title']; ?>
            <span></span>
        </button>
        <?php endif; ?>

        <?php if(!empty($accordeon['text'])) : ?>
        <div class="accordeon_text"><?php echo $accordeon['text']; ?></div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>