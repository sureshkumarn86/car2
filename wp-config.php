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
define('DB_NAME', 'sarav');

/** MySQL database username */
define('DB_USER', 'sarav');

/** MySQL database password */
define('DB_PASSWORD', 'soft@123.');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`{LOzWK*@TTGIU#T6{8*]m.tY:3u|9Xofq3_I_uN2h@zwYHl&]voy.S_u%;g-i98');
define('SECURE_AUTH_KEY',  'CS/igj{Nq5P:W*;UccN)~G.xt{B]3Jsv%Wef8eB7`6OcmYt13smr~ZIXPYVT:.&1');
define('LOGGED_IN_KEY',    '{bbpF15WAzFjWE&=qT0f:M1/R(g{aFn]J`aOy%E3kK>%ot}>2S;:e|jwkgar#<):');
define('NONCE_KEY',        'eJ5zA/NIEl92%=U%+ zu?h(1Y}/2p0f6#=?%)o:-?yd2?R^L#LIc=5ImVm.*~oh8');
define('AUTH_SALT',        'kK?rBQ>vjmL9qi^5~gU>n{,+S{$5JKpm`btJMjKe;wWv u!2 ]FC1cJ) (W[I(Ef');
define('SECURE_AUTH_SALT', '*iI4*=GgLN*CV|Z?lDAvlTZJ &tNWSzK53BvphHb6a!$M[7h2z0S]{%)(G^G/LGz');
define('LOGGED_IN_SALT',   '}`>Vv9UmQkJB`D%Ml>oid]0Y<<Oi{>M_b5J!n~[gr7quLF76 a[??m$:XSTg~v;J');
define('NONCE_SALT',       '4 74U<FFT3p{f([v#1B:(G+>H{._-&F]LFAem1mBya_(yG?Nt)SS#Q(Mw]QTOmfh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'secur_';

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


define('WP_MEMORY_LIMIT', '256M');
