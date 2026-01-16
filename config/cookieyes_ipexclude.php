<?php
$exclude_ips = ['213.135.242.85']; // remplacer par les IP à exclure
$remote_ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (!in_array($remote_ip, $exclude_ips)) { ?>
    <!-- CookieYes script -->
	<script id="cookieyes" src="https://cdn-cookieyes.com/client_data/18d8a39f1057f2e5784427dd77c6f6df/script.js"></script> 
    <?php
} else {}