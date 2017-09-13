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
define('DB_NAME', 'hydrostonemarket');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T +!4bPy?zbi8kCk_80t{5UQyEQFeG}t@yn>c]<ax->Tv`r6 |YtbSp,-XU;MFb}');
define('SECURE_AUTH_KEY',  'AU36t=lNv}eY5Qc=BC),[~[]8DqwTiGk%3(e>XFS7P*hzzDwXG@-.caB_S 2B;K:');
define('LOGGED_IN_KEY',    '=KYA/!.!H!|U$c5xD?;d-F*J#ry,:rF{z^Pwc)j5mNNcn.wa|$P!P6_zk8u&gbB.');
define('NONCE_KEY',        '-^`(l=T)&zS(RQ:q{wy60Q/ u U=GNrAPdp`>yyc+|8>j1oNFn{L%i/H)g-nH9yU');
define('AUTH_SALT',        '4m1)73imr}>L:!EAT-QG;g~-NXlvLgE-lNV-I)KX,wq-JU{JIcmAEs@dI/R!v?<>');
define('SECURE_AUTH_SALT', 'ssL6Un-{,Qq#QTb f(SKOt?78}`6WBF:i/|N@7gkBZE|tR-=vxMv|BC1d%CF-f_k');
define('LOGGED_IN_SALT',   'Z6d|@wSHdew(k_pP-2f6S+7|..pyD-!bQP>x-7wr}l9O%Cs|NTdEtAlC?[8]`Cq7');
define('NONCE_SALT',       '3Ok8H3&-C1+LloX}=0qEp(jOHrg]LEA}H0HeF{tBegGDcbbksv7gV3R]dO-9^g+)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_9475hsu76q4_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
