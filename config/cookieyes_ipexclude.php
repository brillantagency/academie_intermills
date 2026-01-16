<?php
$exclude_ips = ['213.135.242.85']; // remplacer par les IP à exclure
$remote_ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (!in_array($remote_ip, $exclude_ips)) { ?>
    <!-- CookieYes script -->
	<script id="cookieyes" src="https://cdn-cookieyes.com/client_data/5be498a793e02ce622c26e32df1e9573/script.js"></script> 
    <?php
} else {}