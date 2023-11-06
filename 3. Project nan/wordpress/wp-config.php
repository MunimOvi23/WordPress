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
define( 'DB_NAME', 'cwh' );

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
define( 'AUTH_KEY',         '*0AQvk70zvWa&0LuP 9@^V |0WxG+Mq/ow6?3-0jl<tD9zAq,vZr(Ve9UV6w>iQJ' );
define( 'SECURE_AUTH_KEY',  'f]K6C951VT:qw}1BVG k1~H/Z3M*Taex(&a64~SYYyq9}*Rny1u3>94Hn@~:SzZQ' );
define( 'LOGGED_IN_KEY',    'z5^vKj:osl1+r(!6$R*##vAWQ+(+z_Sv5FY *E4(uH8U)MbZ4Yz<G[M;%K^%,|fT' );
define( 'NONCE_KEY',        'nFp;L%b{6c&mYDF|7,qCFMTP@|fc_WKsZY/|$;#_XD06+xCoey^%Fg]oXjw*fAX!' );
define( 'AUTH_SALT',        '!J5pHC#.e2cDg=Q/f)B2G/`jAD&<`YwghIif7*HE*Uf$_PbYczZVt%tgie*soY_I' );
define( 'SECURE_AUTH_SALT', 'j4urPP`M9#bRc[X+,cOS]TGN{rF= e?bMErt[>lBbhv{H]k{Dj;A~+Zo)TbwS-1^' );
define( 'LOGGED_IN_SALT',   '<?t[xaE7,k)m]{S]N3(f|i?`]Gxz2(UZZgXE9zxdVr7BA9A][B+6H7Dl{1i@1I`u' );
define( 'NONCE_SALT',       'He2//;6d1(R|{Pn_~j6EZKwJadr[%I$V8  nOCF[/A^Rsk$S1:,pp^f]43&lpj&:' );

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
