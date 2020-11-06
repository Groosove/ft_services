<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql-svc:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+!@(6t/hAb_a/=87wf|</S_9=uF-DY/q~3B0UOLG2el@ tJwzv:PoLuBQAA{49Bk' );
define( 'SECURE_AUTH_KEY',  'zFLsxF]K7hycR$PFR$MT=a`w,J!iT[Y7x51qfN|m2L)Hq539;tiH)5/U,?$GvqWt' );
define( 'LOGGED_IN_KEY',    'u>+7iw0j`<$F[[gG]Wr63B!sk[re*=|(4%WzfQJZ8jE^%.rK^-MV bM|~g}R1j}&' );
define( 'NONCE_KEY',        'SWclvN+p)62up9}_T+U%~M$jlwKZgQc}S)[_JYW|4a2g0GFKf$s%q[i4-`A$Z<5h' );
define( 'AUTH_SALT',        '!D3K0B>D7_T`@X1z8FeOUXpI7KE,d/ 9Fcra${T1x&J-E[b{O|G<bdhrRl;QO}Vy' );
define( 'SECURE_AUTH_SALT', '(JVtOTAOcb~X7T H4Y;$ (tl Ron8:B8#gDB[4g?@T|+]c`=[zS391TUrW&E%H{B' );
define( 'LOGGED_IN_SALT',   'H<h82jBT:kdod`0ozdMMJgxjVO3%e7x`WcdPFf._#):(=wB<-=jz1g|t8GBDOs3G' );
define( 'NONCE_SALT',       'D6:A)iyMx[X}KH}Kexw*-5M;OGP0LP2t:tg]qL2gB4J+N|4LF>:+86ikTgWL7$7O' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
