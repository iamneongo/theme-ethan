<?php
if (!defined('ABSPATH')) {
    exit;
}

$home = get_template_directory() . '/templates/index.php';
if (file_exists($home)) {
    require $home;
    return;
}

echo 'Ethan Dao Vanilla theme is installed.';
