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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prostositevnua2019' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '*5-;5`JWJjd3}>Fb)e{ Hu-a$o64G|Y&tS?)i/g^uLf9Zb:|Ap9L]:Vl{BOMfkkG' );
define( 'SECURE_AUTH_KEY',  'C }ooZk+/%hod~8#p|@70mbo}<2huX<_4f&K)8pIc-ma2bX+;8LieO:Awa@UL!Ri' );
define( 'LOGGED_IN_KEY',    'DN}janYshpw*Y.I y0;`|kVl7O,6}hx P3Py#Hd*N,,{*k7sv%o}`zvc$zVmElko' );
define( 'NONCE_KEY',        '}?6x+3SRc*N]c#yEnH}}*[vNR+DI*nAIxP!I(z>gY)*bESVpAXS_i?L9]pVS,eRl' );
define( 'AUTH_SALT',        '_PGHF[2UoN`]F/ZRjRbVgUCCifD}9L@-yg}L-EN[`|&sL}5&}+Tp7,}+FNfXsD=q' );
define( 'SECURE_AUTH_SALT', 'r^C#2gYZio{x$[y@&)@fOO];2 liY3U9(Q%LWA+(8R(~U!b@qbtZzhK(j%M!5kK|' );
define( 'LOGGED_IN_SALT',   'nh?H6&etF:NEXD7X$d+iDamFPZ@zhQ3t_}&-tuIo+2*B&v8 Eg=>yrHn)L{G0X97' );
define( 'NONCE_SALT',       'T %g^+`pI2}*as?a*Z~p(~% !u<QR&1Qh.0sW32j!Gj+Dh_{L`X++)eLmG;,UY6n' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
