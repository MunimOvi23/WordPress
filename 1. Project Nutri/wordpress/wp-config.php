<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '1A2:){ uH?5](<^xUJ+DF^#VL Z2u3?Y%Hu~wBE46k[qd*jXz+P0tI1Or6u_i } ' );
define( 'SECURE_AUTH_KEY',  '@X@Tu;O1Z#5R232L^$PmC8*~WvOnt~IdfXY7`mABW:huF5@red~?>Qry]fb:1=Q2' );
define( 'LOGGED_IN_KEY',    'SFItA<OV^KG:|~[d!rH2EEw#jj8`r)a2I:{8#!fv{iZOSHX)OP_s|W%9Dwn6+Q-i' );
define( 'NONCE_KEY',        '(4U]^ed4$0?H~|p1A2jLQkm7?(~n8.*[0P}|K<DULE;2Vt<fBGns5YJ5~[;l;+>H' );
define( 'AUTH_SALT',        '8U6#d@M!Fv~X)]YWX1]-RSyL@oY;|[c<&lc;D2RiV ir~$=%c|I*xW_0D-DBRc0r' );
define( 'SECURE_AUTH_SALT', 'Yv#/)>yp]!N|<p4=T{zxl`F7KX-G^i)b*{`tu7};}Zv}oTOGJ5!YrKqk:T_BuC4p' );
define( 'LOGGED_IN_SALT',   'jq>KKwY{_;D;Ven8*_-}WY?EUr3;tQ+IIUM.:$yUOd[+TrjK13nI7p&3%(D`5J2I' );
define( 'NONCE_SALT',       '2d^nd8&4W8D3zcQ}YI(|$%$FxtBM{@Zlwe^7 snp:E>}W|83@p^GJPiXRVbU#wPf' );

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
