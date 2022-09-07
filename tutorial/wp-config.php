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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_tut' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'osama2003' );

/** Database hostname */
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
define( 'AUTH_KEY',         'A)CfV4Y,n+o|19|~n+!S|N(&1jvk(:3QD}Q@zs./MC20+pNoD+ZJ(1/o6Ev8K2/c' );
define( 'SECURE_AUTH_KEY',  '!W[GZ`Q2G#gHaj#?L*na=K*Xv]ztc doMGgXib{5>gBTYV`g0kV=)ayK9`/pg]l9' );
define( 'LOGGED_IN_KEY',    'H#H|J2}:|-c<:zaZ6RPQu9,,x0Cxb!>R=r>R yGzxT`yF*,~(E $My/s<[WEYV7;' );
define( 'NONCE_KEY',        'Deu_E_gc5GsfP/1_i(&y&czMepA!(Yi^#C :u(X`fYHF#wrW[W~Ef_yq&StL*>O[' );
define( 'AUTH_SALT',        '*X4(kMV8QM!Oc@Wf_FL}&&<94gx93<5J`w|s6+m8y6w>eX<|XixHh)(7~5YO!>(y' );
define( 'SECURE_AUTH_SALT', 'WEj*Fvvo(@f`b/#hiYVnYLdunVPWP58O|wlQ#1_w3F?UCoavM46T)1jq7}IdFI=2' );
define( 'LOGGED_IN_SALT',   'Fc.##(p0WKp}YE9^Px:UG@+-]=N+ztzss4 a}xgKfNMC9(,BY|{Z;EaAUXhvmZ+C' );
define( 'NONCE_SALT',       'r)O=rAzA![b,UXn)s3+m7l, _F,v*bUY~GI|>_~kp&LtAs=MY<x`|T< 4`8FAEgQ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
