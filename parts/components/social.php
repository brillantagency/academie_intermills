<?php
$company_instagram = get_field('company_instagram', 'option');
$company_facebook  = get_field('company_facebook', 'option');
$company_tiktok    = get_field('company_tiktok', 'option');
$company_spotify   = get_field('company_spotify', 'option');
$company_linkedin  = get_field('company_linkedin', 'option');
$company_youtube   = get_field('company_youtube', 'option');

if(!empty($company_phone) || !empty($company_mail) || !empty($company_linkedin) || !empty($company_instagram) || !empty($company_facebook) || !empty($company_youtube) || !empty($company_linkedin) || !empty($company_tiktok)) :?>

<div class="social">
	<div class="content-social">
		<ul>
			<?php if(!empty($company_linkedin)) :?>
			<li>
				<a href="<?php echo $company_linkedin; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien Linkedin', 'brillant'); ?>">
					<svg class="social_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
				</a>
			</li>
			<?php endif; ?>

			<?php if(!empty($company_instagram)) :?>
			<li>
				<a href="<?php echo $company_instagram; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien Instagram', 'brillant'); ?>">
					<svg class="social_icon" xmlns="http://www.w3.org/2000/svg" data-name="social_instagram" viewBox="0 0 27.52 27.52"><path class="cls-1" d="M21.05,4.91c-.89,0-1.61.72-1.61,1.61s.72,1.61,1.61,1.61,1.61-.72,1.61-1.61-.72-1.61-1.61-1.61Z"/><path class="cls-1" d="M13.87,6.98c-3.74,0-6.78,3.04-6.78,6.78s3.04,6.78,6.78,6.78,6.78-3.04,6.78-6.78-3.04-6.78-6.78-6.78ZM13.87,18.1c-2.39,0-4.34-1.95-4.34-4.34s1.95-4.34,4.34-4.34,4.34,1.95,4.34,4.34-1.95,4.34-4.34,4.34Z"/><path class="cls-1" d="M19.25,27.52h-10.99c-4.56,0-8.27-3.71-8.27-8.27v-10.99C0,3.71,3.71,0,8.27,0h10.99c4.56,0,8.27,3.71,8.27,8.27v10.99c0,4.56-3.71,8.27-8.27,8.27ZM8.27,2.59c-3.13,0-5.68,2.55-5.68,5.68v10.99c0,3.13,2.55,5.68,5.68,5.68h10.99c3.13,0,5.68-2.55,5.68-5.68v-10.99c0-3.13-2.55-5.68-5.68-5.68h-10.99Z"/></svg>
				</a>
			</li>
			<?php endif; ?>

			<?php if(!empty($company_facebook)) :?>
			<li>
				<a href="<?php echo $company_facebook; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien Facebook', 'brillant'); ?>">
					<svg class="social_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-name="social_facebook" viewBox="0 0 15.82 29.54"><path class="cls-1" d="M10.47,29.54v-12.92h4.31l.82-5.35h-5.13v-3.47c0-1.46.72-2.89,3.01-2.89h2.33V.36s-2.12-.36-4.14-.36c-4.22,0-6.98,2.56-6.98,7.19v4.07H0v5.35h4.7v12.92h5.78Z"/></svg>
				</a>
			</li>
			<?php endif; ?>

			<?php if(!empty($company_youtube)) :?>
			<li>
				<a href="<?php echo $company_youtube; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien YouTube', 'brillant'); ?>">
					<svg class="social_icon" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
				
				</a>
			</li>
			<?php endif; ?>

			<?php if(!empty($company_tiktok)) :?>
			<li>
				<a href="<?php echo $company_tiktok; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien TikTok', 'brillant'); ?>">
					<svg class="social_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 138 159">
						<path d="M72.4789 0.132562C81.1483 5.03708e-07 89.7542 0.0689322 98.3547 0C98.6407 10.7693 103.005 20.4623 109.948 27.6418L109.937 27.6312C117.409 34.3706 127.133 38.7399 137.852 39.4822L138 39.4928V66.1961C127.874 65.9416 118.352 63.6032 109.767 59.5839L110.202 59.7642C106.05 57.7652 102.539 55.7131 99.2021 53.4224L99.4775 53.6027C99.4139 72.9514 99.541 92.3002 99.3451 111.58C98.7996 121.405 95.5373 130.367 90.3049 137.848L90.4109 137.684C81.662 150.23 67.4901 158.464 51.3746 158.952H51.3005C50.6491 158.984 49.8812 159 49.108 159C39.946 159 31.3825 156.444 24.0847 152.006L24.2966 152.128C11.0144 144.127 1.85247 130.436 0.157775 114.512L0.136591 114.295C0.00419333 110.981 -0.0593582 107.667 0.0730399 104.422C2.66804 79.0811 23.8729 59.4779 49.6482 59.4779C52.545 59.4779 55.3836 59.7271 58.1428 60.199L57.8462 60.1566C57.9786 69.9608 57.5814 79.7704 57.5814 89.5747C55.3413 88.7634 52.7569 88.2915 50.0612 88.2915C40.1685 88.2915 31.7532 94.6227 28.6392 103.462L28.5916 103.621C27.8872 105.885 27.4794 108.489 27.4794 111.182C27.4794 112.275 27.5483 113.356 27.6754 114.417L27.6648 114.29C29.423 125.138 38.7121 133.325 49.913 133.325C50.236 133.325 50.5538 133.32 50.8715 133.304H50.8239C58.5718 133.071 65.2976 128.898 69.1001 122.731L69.153 122.636C70.567 120.663 71.5362 118.277 71.8592 115.684L71.8645 115.61C72.5265 103.748 72.2617 91.9555 72.3253 80.0939C72.3888 53.3906 72.2617 26.751 72.4577 0.116655L72.4789 0.132562Z"/>
					</svg>
				</a>
			</li>
			<?php endif; ?>
			<?php if(!empty($company_spotify)) :?>
			<li>
				<a href="<?php echo $company_spotify; ?>" target="_blank" rel="noopener noreferrer" title="<?php echo __('Lien Spotify', 'brillant'); ?>">
					<svg class="social_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 155 155">
						<g clip-path="url(#clip0_2361_18353)">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M123.341 68.7056C98.363 53.8721 57.1562 52.5061 33.3017 59.7446C29.4732 60.8994 25.4277 58.7447 24.2652 54.9084C23.1027 51.0799 25.265 47.0343 29.0935 45.8718C56.4742 37.5561 101.982 39.1597 130.743 56.2329C134.184 58.2789 135.315 62.7292 133.269 66.1702C131.238 69.6112 126.775 70.7516 123.341 68.7056ZM122.527 90.6765C120.776 93.5208 117.056 94.4107 114.212 92.667C93.3875 79.864 61.628 76.1592 36.9908 83.6379C33.79 84.5989 30.4188 82.8008 29.45 79.6078C28.489 76.4148 30.287 73.0422 33.48 72.0735C61.6202 63.533 96.6115 67.6723 120.536 82.374C123.38 84.1178 124.271 87.84 122.527 90.6765ZM113.041 111.777C111.646 114.056 108.678 114.777 106.4 113.382C88.2027 102.26 65.2938 99.7504 38.316 105.912C35.7198 106.508 33.1235 104.879 32.5345 102.275C31.9377 99.6788 33.5575 97.0933 36.1692 96.4966C65.689 89.7463 91.0082 92.6506 111.437 105.136C113.716 106.531 114.436 109.499 113.041 111.777ZM77.5 0C34.6968 0 0 34.6968 0 77.5C0 120.303 34.6968 155 77.5 155C120.303 155 155 120.303 155 77.5C155 34.7045 120.303 0 77.5 0Z"/>
						</g>
						<defs>
						<clipPath id="clip0_2361_18353">
						<rect width="155" height="155" fill="white"/>
						</clipPath>
						</defs>
					</svg>
				</a>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
<?php endif; ?>