<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_forrest');

/** MySQL database username */
define('DB_USER', 'forrest');

/** MySQL database password */
define('DB_PASSWORD', 'pass');

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
define('AUTH_KEY',         'Qu/xA4e9{$Q-,7`45Ts;t&g?]Vi5jbxfwh7b^<F=5>RPF(Ohb};P lSKsF]?Xp+p');
define('SECURE_AUTH_KEY',  'NF<x;au)c,@!e*OR!?HML>>+]0q-tj!Zj|`SD-_B[4VnNGO@rtfq>%[fwQo~5DAS');
define('LOGGED_IN_KEY',    'ZT9%BLkvU=KlmpfkfOTiWXG39T,%1Cov~#T{{@|0,px 0[4DrBhCl.*z./Z)N5jh');
define('NONCE_KEY',        'b,LkXrcJKWm.|uB)<k97:9)|0 r~D00 -X#%r(Q_S`O5rqMyt!EZ;^ld3$1DF}*N');
define('AUTH_SALT',        'S+GO/<^X+K)<{9+}xURV`-4@@GNh)2w:s<aFd3>Lg-S~p{|I{_Kw-A{`-|1,a<~>');
define('SECURE_AUTH_SALT', '+/mDZ:(E~)?1fF8J&Zx$L4 YP/x+-2b<_uNr=ttQ/e~p-<gv]#$-Ek]vuLl]$!z<');
define('LOGGED_IN_SALT',   '2]Y2g>#vE|1Vj+},cO253>H&7j@l`)a0_w}{s|XBpQ*;HTj<hsGO3NBF${w-4~,X');
define('NONCE_SALT',       'tcz<=wtJ;XGt Jy`*=Q}|1A+5`<{{OePbe:^iUsgY!XHm$.m{;jfo,?<`+rxB-n@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
