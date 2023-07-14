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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ehime' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'S~/;3r9RV(eJJd|,:F1oS]ftOg{KPEVx~O]gZkJ0z7j@qEg:Av]dWB)L0_L%^dP>' );
define( 'SECURE_AUTH_KEY',  'r.^RDmtpO!wF:SRg:.j-)H*E{jK,Zg8j*:3Wpp_C_>jvv{{;lg!&%._ZuXn|<+<|' );
define( 'LOGGED_IN_KEY',    ' =%8f(Hf@rvC[}+XAO3L$ul/.xH@{iiz=K|#0|-c~Y!K%y/;58Q0:y7/NPY|&JIS' );
define( 'NONCE_KEY',        'L^qD,]]*YEvK.6qi?_X3HcVrnr1^5]Ote`E2T#XC6)hqLNf8e.Rj<U%=F(!N{_.o' );
define( 'AUTH_SALT',        'M)Cp6)>14#6<Iu}hx)w&P=PiP7v0xiqPG>~AcUnjhYir/hT->):UoCk{0[z*)U3v' );
define( 'SECURE_AUTH_SALT', 'K|WQ@}Rk3lSQK!;C2f!Vn#T,*fGJLKFQ?Uggo^aFFvgZ8Cw)n3cvw5 @0DqKb5`S' );
define( 'LOGGED_IN_SALT',   '(iA%*n(#HnL0HNyboxwq({:ur4n*2k 3C,7B9!BIxv|J7x[uA<xT uH5edtgex| ' );
define( 'NONCE_SALT',       '1%`N>0Yz8rJt,D(}26]$b-sFtZ?x!8G2WsW0qG|d*iC5d~`D-MF/`2{mXd4RH^2.' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
