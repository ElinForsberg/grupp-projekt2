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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gruppprojekt' );

/** Database username */
define( 'DB_USER', 'ElinF' );

/** Database password */
define( 'DB_PASSWORD', 'ElinF' );

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
define( 'AUTH_KEY',         'Asu-Pc?=TB=-H,/.;=_iE>-~#@ISCV2ol(rXJgs-k;J>uhJUCw~>S!-g?fh`&k-M' );
define( 'SECURE_AUTH_KEY',  '/w20TJ!faFL=+P-EUfd.^u>Sen1Nhc)yOA{,R%B+fKO<ZJ#=yjQ`ybGatu hNR:O' );
define( 'LOGGED_IN_KEY',    'N:&$O:{gs9(S?v[>{/e5!<20#w?]y2uup#buDy/r&){/OKurDt(^?^Z.}dPT@H=K' );
define( 'NONCE_KEY',        'B&~B1|i7vt^ji#.nRJz0BYdK}G (/9&j/N2+.@o08?4.QXAQ:9$$s[fVk@#>8{[%' );
define( 'AUTH_SALT',        '?E<[VpflGz|JhDGQ[IU !EC23]#a-A;j)y>TGUTrk<t|q2r1m:b0WqL&kYris<*T' );
define( 'SECURE_AUTH_SALT', '4ltJm%NLC]=1ORx{@z$ljNx3g.OPscx?8[)d9<6>woxzd~QAolQ+GO*-7oV8D^&+' );
define( 'LOGGED_IN_SALT',   'cieFHlA2B? ;hisYtOY.WS|rQHu:KXuDa?=Fd/mOnY;pz>e{a!t@3!e$mj]RHtty' );
define( 'NONCE_SALT',       'L2R^V-j<BE@`BqOrJRFsAf,rd#%6I33+=n<s7Hbgm?iLW;}{+,r4DP`n?Jk1&2!&' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
