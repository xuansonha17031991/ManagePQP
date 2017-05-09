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
define('DB_NAME', 'thongtinphattu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '9E)td2Ir,bLx$@b%M)EV79/U8?J_Db`8 IMBVc eurM&2hyn7 >3xv_dKI%bC}e|');
define('SECURE_AUTH_KEY',  'gN2KwKZ[Z6sfkJUaI?IXf40D.R@}RZ@SJRQ`N=x{KZ9)k8h,0pP<i$3n]Sfb)%Rn');
define('LOGGED_IN_KEY',    '5%p5L8/gesKO-.#]~vJ>{:-Nz>f_c*{cR`>CsHl@=eK+FS!IkSlyHt6$94U(HlDH');
define('NONCE_KEY',        '(F3_y#O*OpK][9uO6^,tQIYG0HcE0!y|4lS|8HLlOfbiznh@5(QUzi]H4E1fVSF3');
define('AUTH_SALT',        ';5x[gi!.?[/aXP0c=gkE/bflzS591*`o(w9gtuw96O$p{]U=teIMgfD?C, EAT~U');
define('SECURE_AUTH_SALT', '50T@=5]8m^k69t[PIlPl=VCh:6!%}2hg0dPfIUI;1-M67Vn:x); a+]8o;AH!a5Z');
define('LOGGED_IN_SALT',   '-5rM,{^)L]#[fMT_~ gy[VqK%Rqk!qIz2+[MY#2<wt)MxNM]a0(tq+V3sr>_`]`h');
define('NONCE_SALT',       ',>g{4yE+0.(7PLVzkl;CX{Qc,;,s*?[$Y^Yht28i|^,7fR+Un||~4|grBAE!;r9R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
