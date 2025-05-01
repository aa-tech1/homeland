<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'word2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'L_0h/ApZ#`Fon+Iczn%VlB?E@{8XO_vn:1S*8|SsS}bXB4RxnjWl[ZKh?APBE1*a' );
define( 'SECURE_AUTH_KEY',  '.$P6iqL<GQ.s@e +}G<&*Osz :<GpL~?/6|npTwvp~wZCz$FZfxA~b?q`[ri3Nt#' );
define( 'LOGGED_IN_KEY',    'H*Ro&X0IYz|-{?0oFpG >[?J5=DJ8Pn^/1>ZQ!,y!pQ#ls!5`0X,zD.~89G&)[<>' );
define( 'NONCE_KEY',        'c=4Q?F;tXH6Om|81Q`9 VO2~V>e485h_zeZKB{7778Q=pMC!J$A.]l;6wU*QMbqy' );
define( 'AUTH_SALT',        '<o}FR?B?NQex=rjxQvcl7~(tB>W~d!;M P[7</(uY7m8*3Z[2/0q/BP`2M ^`&y1' );
define( 'SECURE_AUTH_SALT', 'yDoG5A*R)]T:M!o;tJO@>(Zy!GvF,4bPcEnm~BKa@kd)Xm5s0FnZ97tP<#1@hFQ)' );
define( 'LOGGED_IN_SALT',   '9rC&12=hY/O93Up@p v:Y_D;3B^]d(EDEENb^2SPo>wuSV}~`wA=;3-u9BM0lx9z' );
define( 'NONCE_SALT',       '`+|$K;iuYk4@Y1 @|MR&CR]~MS1L{dp5%pPe4keR>zf#a.,&v};t2ibQT;0le/({' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
