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
define( 'DB_NAME', 'articles' );

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
define( 'AUTH_KEY',         ';A&-zo?W[^nUsRHNx/7zq$?.F]tf<76HrtRqth$V6WA@>.!N-w{. zK4YX6QISxQ' );
define( 'SECURE_AUTH_KEY',  'X!L+G.~FjVeJe0{jS~U#NZDw>XqI.et+KgM[:(%F*#GLhGR`Qdmmfsv=`2~C,pKP' );
define( 'LOGGED_IN_KEY',    '3x&mYg*,kWIE/41He[mMJr8xk(:@zAN6XuC^/T@YGbc,|~li:kJ7.a0/Ew-k;[Pq' );
define( 'NONCE_KEY',        'p|s]I$.c7+cw0YP~]>&vOK=MzJn->.?|B$z:fP~m>e@5tWME]ij$I2B$DokherE^' );
define( 'AUTH_SALT',        '9{`kB6-D0XiIe4h-ZGsw.RD*Li4Ee,!T3P!/o@&;}QI-=#vK@MEM=w:N2I1*O+ON' );
define( 'SECURE_AUTH_SALT', 'fKE(!~G;XVq93^52yoA@Eau-YU<l2$qpP#,G@;L=o>wAG{@vWac3)lA(h+>8{nYs' );
define( 'LOGGED_IN_SALT',   '^<pC(~]&W}](<FU1t})L@MDH<?|CNC$l7,!Gx%~/?)ts?[o/FCic0;WR78sQ|gi-' );
define( 'NONCE_SALT',       'KW<b`k9+ouTG.*/KnbX031KxJiZtMJcO5YtW3tkiNld6bs*us@z%W@/ ,TU,6/XG' );

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
