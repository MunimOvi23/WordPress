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
define( 'DB_NAME', 'cwh2' );

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
define( 'AUTH_KEY',         '+ H3X8e;8&kQ-@t8x+nU0L3Rd^Ns|0,qn*5{9Ah0sW@(vb.c]S_(iq*%y(`v;:OV' );
define( 'SECURE_AUTH_KEY',  '.2dtv?h~#7l:oh1d_@WP|_>wAT(aoqJ/_1*vf/$m).`LVQvgZMK-9iQ>z?A/B(Bc' );
define( 'LOGGED_IN_KEY',    'iqRaly}_ni*zDi&^.<I~7KQ}zN0Sl_<Z2,ZT_P#7Dku4,fweXB9yjyJ,+<-8#E2K' );
define( 'NONCE_KEY',        '?ZuKx|8tdv#0z|SrslwNpSe_U5:z%:wWZ[9U>xW$0w#$|j;/]6g1.-%CAL_<6qg!' );
define( 'AUTH_SALT',        '>8s=H)+_{Z>/aovXC*H9w%qZp_Fo19s/;6n9Kq1Dg[^{:kd(TkHvdA)_$@bCWH) ' );
define( 'SECURE_AUTH_SALT', 'x@1@>?O1jN~1vL /0DG*V89:]Ys~RnWTE%0Huag{umhsT<rEpW,-C]A1-@Y@e-5]' );
define( 'LOGGED_IN_SALT',   ',j_;*F> vM$4@7BH6q9Tw6yfxz-|Gs*i:23LG1m4w,ue*FciwI_*EpTV<.+6CKkZ' );
define( 'NONCE_SALT',       'x86?R*zUCGon#:EtT|p^xt0?0>M0@aX;4FEuH&|%EI=HV,<:DvZxF/V@c_s 56|D' );

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
