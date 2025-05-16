<?php

function base_url($path = '') {
    // Get protocol (http or https)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

    // Get host (e.g., localhost)
    $host = $_SERVER['HTTP_HOST'];

    // Get current folder after localhost (e.g., /stock-management/public)
    $scriptName = dirname($_SERVER['SCRIPT_NAME']);

    // Trim extra slashes
    $base = rtrim($protocol . $host . $scriptName, '/');

    return $base . '/' . ltrim($path, '/');
}
