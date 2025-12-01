<?php $script_footer = get_field('script_footer', 'option'); ?>

    <?php wp_footer(); ?>
    
    <?php if(!empty($script_footer)) : ?>
        <?php echo $script_footer; ?>   
    <?php endif; ?>
</body>
</html>