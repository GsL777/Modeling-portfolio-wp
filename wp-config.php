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
define('DB_NAME', 'modeling-portfolio');

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
define('AUTH_KEY',         'k!&Db->l]f^mko7:WZ,-Ss|Txt0=MaX Zq(8T*T2n5Rcw7d;()UJcySt%K:jFF,3');
define('SECURE_AUTH_KEY',  ':b[uN%5p*I=+,i?mn+d0c1yfgA_fau uRIP+dRBZJWdV4]AM9.(W{]8I:NwF_Cy8');
define('LOGGED_IN_KEY',    ';GcuP3~taF;Y<}4Z70mdt%lZ^E4u>O- VLp<tLQg&c]+vY }/q8?xHkGF0&:}N#R');
define('NONCE_KEY',        'a2wRZbd2}cIjlyp-8.[-,4wfT_{B^+D+%*a!P00L`3s]F1KXnN.iAf9!`Gagog{v');
define('AUTH_SALT',        '8)-a18IX>4Z##bN0p-w-qCd-9@6RYI1uJ@5t;!,y{ 7$m1?L6]G1F7i#?Fjka^pR');
define('SECURE_AUTH_SALT', 'bg&ICU]wr[lqnu,9 |DsJysi?C/aJ8(.w!1_=LSu*ng`fi}A}HYy #w$/D6UF}io');
define('LOGGED_IN_SALT',   'yub[Ak+^;s[PvZH*xf7-)4f@{PV2{RX9Tq>f,2Z~>g2,K1f,1RW,-F;y<z|gR}7e');
define('NONCE_SALT',       '-Yz-dZ>nq/#4*VCl/>!0:IiLEaVELo%<}}ZB:JZ+P2Y857@nNc*oIXooLu!FW`QG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */

$table_prefix  = 'wp_admin'; 


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
