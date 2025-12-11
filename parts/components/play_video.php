<?php if($media) :  ?>
<button role="button" href="" class="icon icon_play">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19" fill="none">
    <path d="M15.75 9.09326L-8.56449e-07 -3.12624e-06L-6.14903e-08 18.1865L15.75 9.09326Z"/>
    </svg>
</button>

<div class="video_modal">
    <div class="video_modal_content">
        <button class="video_modal_close">&times;</button>
        <?php include get_template_directory() . '/parts/components/video.php'; ?>
    </div>
</div>
<?php endif; ?>