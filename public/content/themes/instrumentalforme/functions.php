<?php

// Debug:
// echo __FILE__ . ':' . __LINE__;
// exit();

if (!defined('THEME_GRAYSCALE_VERSION')) {
    define('THEME_GRAYSCALE_VERSION', '1.0.0');
}

// Configure theme :
add_action(
    'after_setup_theme',
    'grayscale_initializeTheme'
);


if (!function_exists('grayscale_initializeTheme')) {
    function grayscale_initializeTheme()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
    }
}

if (!function_exists('grayscale_loadAssets')) {
    function grayscale_loadAssets()
    {
        wp_enqueue_style(
            'grayscale-styles',
            get_theme_file_uri('css/styles.css')
        );

        wp_enqueue_style(
            'google-font',
            'https://fonts.googleapis.com/css?family=Varela+Round',
            'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'
        );

        wp_enqueue_script(
            'grayscale-scripts',
            get_theme_file_uri('js/scripts.js'),
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'https://use.fontawesome.com/releases/v5.15.4/js/all.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
            'https://cdn.startbootstrap.com/sb-forms-latest.js'
        );
    }
}

add_action(
    'wp_enqueue_scripts',
    'grayscale_loadAssets'
);
