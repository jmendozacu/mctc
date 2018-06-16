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
define('DB_NAME', 'boundless');

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
define('AUTH_KEY',         '3yJl_zemy>2L<!rFQEM&PVm6^_HWMcI2PaFzx d0Guhl-%6Pj-K41-V_>At7M Ie');
define('SECURE_AUTH_KEY',  'P{e-TU=BIY,*IZ}(GfBd)F}Y^X^DlS.-=r$Ie_qU Bea6qI$|*L|1zf.SDnqG2xu');
define('LOGGED_IN_KEY',    '*`diYcfrA01S;e|K!k(F9X_d<y2Vd:g)X{8Or*?S# |1G$.O[8qcjV}`2zz!.^O1');
define('NONCE_KEY',        '/Q?^f6Q~>I0m=s#psZLQ i_~vWxU)ucEy>|xNR%[M488nA4@, W,5b~iIoSu}/&i');
define('AUTH_SALT',        'cZ?t_/}K3!vxHXPAo[hfj4H0.c^kDYyFa^-I7Kp[/O45:Zz(!+DhDR%us6b^oq>:');
define('SECURE_AUTH_SALT', 'O9h,r)jkKLQDo^Ph)($#Vj};_cu-1`NY%0H3xHhe?wuS_wE(|cv=ca57d~?#Zp&+');
define('LOGGED_IN_SALT',   'c%65tF4A3}%^ Y26@@pxfBJs7&DA_Uc_NM?:@H]!_H!eew8}JKr_Sy;Xm(8HT%G:');
define('NONCE_SALT',       'K`KXCKC.=U2{H9+2^NiAz{kDlvAI,Yi>0^k+TP|}Ir`fkx8g26|<W{`ihiJ*P7=q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bls_';

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
