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
define( 'DB_NAME', 'rf406760_test' );

/** MySQL database username */
define( 'DB_USER', 'rf406760_test' );

/** MySQL database password */
define( 'DB_PASSWORD', '3e9Zk+Z~t9' );

/** MySQL hostname */
define( 'DB_HOST', 'rf406760.mysql.tools' );

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
define( 'AUTH_KEY',         'lT{ O%SgGmB@cW?{|DO&HlTY{[)cKl,Q8He8Ib-Ks=d-zPIfWo8U(&W+,8g e1~i' );
define( 'SECURE_AUTH_KEY',  'v9k&IE`L?8>m[^yRg9m.a[!tU>f?z!_,hF~dv[`+>oD#FS? ]*,WGGH0BY*]s{Gv' );
define( 'LOGGED_IN_KEY',    '$b#;{*vses4+fjY8%!i[&?UglM>q4hkMEt@#Wbt3-Fec`K7J%;]#^:Z>g@%ESR9S' );
define( 'NONCE_KEY',        'ZxR_(R.5k&?=SkjjRK@/83j@lF@:Ebd0Tgv%oMGRQ(fYRJ7x]OD< fqxmpax*JMy' );
define( 'AUTH_SALT',        '5HN;8}#dcR/|a!>i/l4g4|:b~]3PsGdh.X#d:57]2vRB9O{Nub}{S8?],O Rb)Dt' );
define( 'SECURE_AUTH_SALT', 'WBNEE=.r-h*!3wVBl.w8^5oos;*;Y3_(nPlty[f6@j&HU]p-.f0pC;-F@4!pfsai' );
define( 'LOGGED_IN_SALT',   'B>SQ r-&Ip8,Cw,Pz^H&P_jy|a-FE W(D9JE7%)vgs#$k*8DKIGBZsgdqc(W%K3>' );
define( 'NONCE_SALT',       '!Z<A(Et,9q`Pc4/J{nY&CXXcJqv )B]()LE`9giy]_=l?cT#n=&0sD>kCk8e}%gE' );

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
