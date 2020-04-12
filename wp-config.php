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
define( 'DB_NAME', 'elementor_wp' );

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
define( 'AUTH_KEY',         ';e1Vc(|n7$qGDe.vw{q)&NHgK$gvIS/BsyyGFC8Yt+jX5.2DOdz|N[?nKf>946_@' );
define( 'SECURE_AUTH_KEY',  '<2 iv28Lc9C/0}FYz{?CiIL aY)o DunyklF?=~Gs8*HFN8]V4,BbDh[hH_n=?TK' );
define( 'LOGGED_IN_KEY',    '~4=D1H2FLs,<#7sgsSW(i9KE/[H[4wu?Mc@&>$;h<ejHHGmMzcisSg1%;UlQkEPf' );
define( 'NONCE_KEY',        '|UkT:U.Y[KJSs/x?T5:IaCU$I)Chz~xFM&0}_aR$.tgs>l:TaRPl`zuH+xg,Fi9I' );
define( 'AUTH_SALT',        ',fgY%RWJ6|?(SZ,H_uI;C[Q5?^@=_eM}[!uV-4&$~/O0!VN32V{,*H2MUe>&gQJ|' );
define( 'SECURE_AUTH_SALT', 't dl};}!:[c`Bu[WrYR] f:Br! 2$W@t@,h 3,pB.?GdcTfZY<^S3$:;o5GavT2^' );
define( 'LOGGED_IN_SALT',   's3e0Wi@,Yx23C67%@RRKCYzHr^9R)yOpVIR+Ly)}?@qy9~G,O:x]x`N+0RE2BQ)?' );
define( 'NONCE_SALT',       'ZqFW}8=quLv68}/`~`}/!|1!M~P[p&QU/[*j(Z!eXJ~Y^KxKC}x-q6T=Jwc0iE_-' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ele_';

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
