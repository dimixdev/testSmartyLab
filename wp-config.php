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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'xKfbs[41-$7qx4Hjc#I!h`xV_ZRP}zJ{Y%8DCV2-E{zb+wuq2xBSxSe:8~Xz|vLc' );
define( 'SECURE_AUTH_KEY',   'Rx!:|RVu#oC%ffT6@f;k@sfE8N&#3f*mF]E`]B(P~$GCH_1o-5moL/[{od}mc<+{' );
define( 'LOGGED_IN_KEY',     'RgvLm`toG0npZ%as`3W~*H)5;KXBz~Z;y,a=Urw)Np>r?1XpKy.;lI0Yt0^j:0+o' );
define( 'NONCE_KEY',         'tVwzQbWL.:%vP6>c_3S3>35w^_.;eX:~pn9`vb2sb?KYYS&B_r8oT|n#FJ))jqKU' );
define( 'AUTH_SALT',         'gqF!Xs^<Ao_:;^06] G08m=sO)q_gj#;RYMrn_C:z5y[[M&1tIe^Hv]V=L:XGVK}' );
define( 'SECURE_AUTH_SALT',  '<Bla>(8(CnRFy)hkMSxkT[et1%%kUd2fv,06*E`,woJ;kEh=zT.EPKGoae?8C/F:' );
define( 'LOGGED_IN_SALT',    ';1(dj!xWg$`@k`A`O1[ZHd<Ona5@woep`@*(1Q3Wp^s-9shn%[9;snB<XC2S0xI4' );
define( 'NONCE_SALT',        'e?G5Mpsi[?c;`pDNmUu&nuNr~(*:?/2mW:M.B^:[d1M Ga^V,RF5Bf7xT[EJSznb' );
define( 'WP_CACHE_KEY_SALT', '9Fl]/M2Q!EJ(NjQu+~>=*v<=!=zoPC5`i|MG^o>*>k+jhG,Sk9-mk(SodIV)-9g=' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
