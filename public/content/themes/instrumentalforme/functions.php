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
            'font-awesome-style',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
        );

        wp_enqueue_style(
            'social-styles',
            get_theme_file_uri('css/social.css')
        );

        wp_enqueue_style(
            'instrumental-styles',
            get_theme_file_uri('css/instrumental.css')
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

//1 Add action : add first name and last name in the default registration form
add_action('register_form', 'myplugin_register_form');
function myplugin_register_form()
{

    $first_name = (!empty($_POST['first_name'])) ? trim($_POST['first_name']) : '';
    $last_name = (!empty($_POST['last_name'])) ? trim($_POST['last_name']) : '';

?>
    <p>
        <label for="first_name"><?php _e('Prénom', 'mydomain') ?><br />
            <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(wp_unslash($first_name)); ?>" size="25" /></label>
    </p>

    <p>
        <label for="last_name"><?php _e('Nom', 'mydomain') ?><br />
            <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(wp_unslash($last_name)); ?>" size="25" /></label>
    </p>

<?php
}

//2. Add validation. In this case, we make sure first_name and last_name is required.
add_filter('registration_errors', 'myplugin_registration_errors', 10, 3);
function myplugin_registration_errors($errors, $sanitized_user_login, $user_email)
{

    if (empty($_POST['first_name']) || !empty($_POST['first_name']) && trim($_POST['first_name']) == '') {
        $errors->add('first_name_error', __('<strong>ERROR</strong>: Vous devez ajouter votre prénom.', 'mydomain'));
    }
    if (empty($_POST['last_name']) || !empty($_POST['last_name']) && trim($_POST['last_name']) == '') {
        $errors->add('last_name_error', __('<strong>ERROR</strong>: Vous devez ajouter votre nom.', 'mydomain'));
    }
    return $errors;
}

//3. Finally, save our extra registration user meta.
add_action('user_register', 'myplugin_user_register');
function myplugin_user_register($user_id)
{
    if (!empty($_POST['first_name'])) {
        update_user_meta($user_id, 'first_name', trim($_POST['first_name']));
        update_user_meta($user_id, 'last_name', trim($_POST['last_name']));
    }
}

add_filter('get_the_excerpt', function ($excerpt) {

    // Get the 250 first characters
    return substr($excerpt, 0, 250) . '...';
});
