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
define('DB_NAME', 'lorenzoovens');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'nwGrz(bAy+x.skH{Ca5RxdLI]wSIR9fATDjCA[)v(Vm*)hw+t+qM2vDVL?mqdyQ:');
define('SECURE_AUTH_KEY',  'QP.F1DPNQ>eXlTRs!XB)]3+~tk`rWQR}d#^ WNqIS{>GFOz-]c:n^W3hT3mWa,Ky');
define('LOGGED_IN_KEY',    '>e^46,#|Z]J1L2{p-<9cgcd1 a6(Je?AYF9Ap/.nUWKCz=TOT4gp)W`;f3V+-V,z');
define('NONCE_KEY',        'OTn-y8V4dK7/<S4V BJbw[ir|fwbs9zp&s6gnuLs?uFhtmR%7q.+b+cgbAS^t W_');
define('AUTH_SALT',        'i`+SCs#}vHi:]-&/F+5;GD::Ke{Wp1v,Ul/|[i)<!V{ N*nk(.,ohXr[{ [ssiDD');
define('SECURE_AUTH_SALT', 'q`cmW)(xKoS3Dzs_#BZ}mnD<u{z<JrnM)7R{-u|(VmpwLhgUVcWMZ2Uut!.713*@');
define('LOGGED_IN_SALT',   'vU?%uL,cO)O@AZ>YX(-TYh7`|ZnGU}*F|^a-aMTIo~Q:d8XD*inMx33GOs|:pIo.');
define('NONCE_SALT',       '| ~-7Xl+XB0y?0AkDW{mLE_G{B.7;N)f7?uxe{E[y9Q_S80SGr%;2Tp@78jGe|PY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lo_';

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
