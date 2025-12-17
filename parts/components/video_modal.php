<?php 

if($block_video === 'carriere') {
    if(!empty($media['video_upload']) or !empty($media['video_embed'])) {
        $video        = get_field('carriere_video');
        $video_embed  = $video['video_embed'];
        $video_upload = $video['video_upload'];
        $media        = true;
    } else {
        $media = false;
    }
} else {
    $video = get_sub_field($block_video . 'video');
}


/*if($block_video === 'carriere') {
    if(!empty($media['video_upload']) or !empty($media['video_embed'])) {
        $media = true;
    } else {
        $media = false;
    }
} else {
    $video = get_sub_field($block_video . 'video');
}

$video_embed    = $video['video_embed'] ?? false;
$video_upload   = $video['video_upload'] ?? false;
$video_autoplay = $video['video_autoplay'] ?? false;
$video_loop     = $video['video_loop'] ?? false;
$video_control  = $video['video_control'] ?? false;*/

if($media && (!empty($video_upload) or !empty($video_embed))) : ?>
<button role="button" class="icon icon_play">
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