<?php if($media): ?>
<div class="component_video">
    <?php if ($video_upload): ?>
        <iframe class="video"
            src="https://www.youtube.com/embed/<?php echo $video_upload; ?>?rel=0&modestbranding=1&<?php echo $video_autoplay ? 'autoplay=1&' : '' ?><?php echo $video_loop ? 'mute=1&loop=1&playlist=' . $video_upload . '&' : ''; ?><?php echo $video_control ? 'controls=1' : 'controls=0'; ?>" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
        </iframe>
    <?php elseif($video_embed): ?>
        <video class="video"
            src="<?php echo $video_embed['url']; ?>" 
            <?php echo $video_autoplay ? 'autoplay muted' : ''; ?> 
            <?php echo $video_loop ? 'loop' : ''; ?> 
            <?php echo $video_control ? 'controls' : ''; ?> 
            playsinline>
        </video>
    <?php else: ?>
        <p><?php echo __('⚠️ Aucune vidéo disponible', 'brillant'); ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>