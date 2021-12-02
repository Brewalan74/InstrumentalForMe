<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// JWT AUTH CONFIGURATION
define("JWT_AUTH_SECRET_KEY", "fe8b02455750f967eac9be50b9f1e13924152d08451d6296d44f74773e88858098925e97");
define("JWT_AUTH_CORS_ENABLE", true);

// =================================
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'instrumental' );

/** MySQL database username */
define( 'DB_USER', 'explorateur' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Ereul9Aeng' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$2y$10$MeuXiIw3Zc64mAxrq7Fbne6QM/.mfg2qanrXYXT0ofXjAzSEzCXpu' );
define( 'SECURE_AUTH_KEY',  '$2y$10$BPhdCRtT7UOh.Bks4VC1EO2qq9N30utDzpTN0HD4RHLf4EWwEIOUC' );
define( 'LOGGED_IN_KEY',    '$2y$10$uvXftxHPLsi3erp5pMr2sOSB2CpArDs7Zh8rySCeb3UgqTFcyXrhW' );
define( 'NONCE_KEY',        '$2y$10$us/owcNpvvWLqxlwNvc94O0TmWfjGaXzG/vabINMx/yrvkHSNDoEi' );
define( 'AUTH_SALT',        '$2y$10$vvY5.U4VLKQPidi7aNvCyOWtWdT24v53xT8iEMAvSElBZBxqI08.y' );
define( 'SECURE_AUTH_SALT', '$2y$10$OvfMF3gUrnqLAgo/GBA/kuvCo8GvvdRLLXKp7cXScjnO1KNndIUZ6' );
define( 'LOGGED_IN_SALT',   '$2y$10$0WX6iaq701/bWy2tNBdCI.TUfjaJLrZFsME8JOsgA4.YQ2aMBjnG2' );
define( 'NONCE_SALT',       '$2y$10$8zmryXwD0T6ZzfgTIgtuu.K1PXWLU4xU9vrrcwKBjwz5ifQNAwW2K' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wdl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */





define('WP_HOME', rtrim ( 'http://localhost/APO/projet-instrumental4me/public', '/' ));
define('WP_SITEURL', WP_HOME . '/wp');
define('WP_CONTENT_URL', WP_HOME . '/content');
define('WP_CONTENT_DIR', __DIR__ . '/content');
define('FS_METHOD','direct');
/* That\'s all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
