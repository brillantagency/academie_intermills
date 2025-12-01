# Dependency block
Swiper
Add CDN JS in /config/enqueur.php
"wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.2', true);"

Add CDN CSS in header
<link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
</noscript>