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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'salesforce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '45QCa4qZbN9+,+Mwd3TU7@o3F@fE}_&w6~kI./s]klLM9,n$JNCQ@-UGKswF}8%`' );
define( 'SECURE_AUTH_KEY',  's!a[qedG:C2>R?P([6Zf s:+`CBiRo*4OJy0#.0! sAwMbwAZ7#0xcD2vX)pLMk}' );
define( 'LOGGED_IN_KEY',    'U</zpKWhyEz?mDd7qBK`_4Gld-DF(5Ps=/|hfs8ir-c(3e-gBN$_RwTUV@`SZpgN' );
define( 'NONCE_KEY',        'f+fO7pB?TZt~fGJlfPrSdt#qwZl$eL+*OX}a;N>l:8~NzC&v@PUZQpeylz5 f#*^' );
define( 'AUTH_SALT',        'VMynrD>#<z{BadcM~J/(9FYVU&F=PlEb*{{*!O+Z@a2?^W*<Jzv+0SGMax@c0uB+' );
define( 'SECURE_AUTH_SALT', '[dP^yx02]N3A_a@sRzB5ckhKodk1pT]7?=;Y-jfor<-#k-sHC^*#_7jSi!rc_kWe' );
define( 'LOGGED_IN_SALT',   '=8:P  LNL+,SA_6zGO`<_0IeFdbQO%kX,[zA%zYKCrWiH7qM|p&X(1{lH5S_}Rzl' );
define( 'NONCE_SALT',       ' n6~.4B%g}@9*WQ<lwb8OK9,2pDz)BFAjS(yPx*|{goJINh^8IO!T3ZL:DHiJ(;f' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sf';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
