<?php

// Debug:
// echo __FILE__ . ':' . __LINE__;
// exit();

if (!defined('THEME_INSTRUMENTALFORME_VERSION')) {
    define('THEME_INSTRUMENTALFORME_VERSION', '1.0.0');
}

// Configure theme :
add_action(
    'after_setup_theme',
    'instrumentalforme_initializeTheme'
);


if (!function_exists('instrumentalforme_initializeTheme')) {
    function instrumentalforme_initializeTheme()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
    }
}

if (!function_exists('instrumentalforme_loadAssets')) {
    function instrumentalforme_loadAssets()
    {
        wp_enqueue_style(
            'instrumentalforme-styles',
            get_theme_file_uri('css/styles.css')
        );

        wp_enqueue_style(
            'google-font',
            'https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900',
            'https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i'
        );

        wp_enqueue_script(
            'instrumentalforme-scripts',
            get_theme_file_uri('js/scripts.js'),
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'https://use.fontawesome.com/releases/v5.15.4/js/all.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
        );
    }
}

add_action(
    'wp_enqueue_scripts',
    'instrumentalforme_loadAssets'
);
