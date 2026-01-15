<?php if($media): ?>
<div class="component_video">
    <?php if ($video_upload): ?>
        <iframe class="video" src="https://www.youtube.com/embed/<?php echo esc_attr($video_upload); ?>?rel=0&modestbranding=1<?php echo $video_autoplay ? '&autoplay=1&mute=1' : ''; ?><?php echo $video_loop ? '&loop=1&playlist=' . esc_attr($video_upload) : ''; ?>&controls=<?php echo $video_control ? 1 : 0; ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <?php elseif($video_embed): ?>
        <video class="video"
            src="<?php echo esc_url($video_embed['url']); ?>"
            <?php echo $video_autoplay ? 'autoplay muted' : ''; ?>
            <?php echo $video_loop ? 'loop' : ''; ?>
            <?php echo $video_control ? 'controls' : ''; ?>
            playsinline
            preload="metadata">
        </video>
    <?php else: ?>
        <p><?php echo __('⚠️ Aucune vidéo disponible', 'brillant'); ?></p>
    <?php endif; ?>
</div>
<?php endif; ?>