<?php 
    $script_footer = get_field('scripts_footer', 'option');
    $search = get_field('footer_search', 'option');
    if($search) :
        include(locate_template('parts/components/searchbar.php'));
    ?>
    
    <div id="search_popup" class="popup">
        <div class="popup_content">
            <span id="close_popup" class="popup_close">&times;</span>
            <?php echo include(locate_template('parts/components/searchbar.php')); ?>
        </div>
    </div>
    <?php endif; ?>

    <?php wp_footer(); ?>
    
    <?php if(!empty($script_footer)) : ?>
        <?php echo $script_footer; ?>   
    <?php endif; ?>
</body>
</html>