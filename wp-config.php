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
define( 'DB_NAME', 'kokomerennew' );

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
define( 'AUTH_KEY',         't#aXY=744^tUZ];|y8f6/+QX=M4lw_0]J_uQ{$gc60:!^%yd=pXoU!T6b]uJ3,a<' );
define( 'SECURE_AUTH_KEY',  'M%C@nx}Mm/7d>rj$d+::l_*-.F7l2lYs>Z~C-$Caf5(R,VZ8U_kV#lDz<UHc-BnY' );
define( 'LOGGED_IN_KEY',    '-VHLR1lchs=~Xprr,uUpx*3P~@f9e0|zZLy-:!i-k;HSn7?5M(#BwYdI)@W-)O@U' );
define( 'NONCE_KEY',        'vE({Q|=S s_Nr&n:8:Xm#%i4JGEWd(%<4gl~WT5C/j4>A,xh0)-q53Pvw<^.:2o3' );
define( 'AUTH_SALT',        'drku){@~>f`PWE+7i;}2hD$e{[$&|@uEvVS7C1F4sH*6{3:bbJ=iY_vE5CoNjlIh' );
define( 'SECURE_AUTH_SALT', '6@6&BtzoQ-VTok4phBoo_/Ne`U8VDOz/``dKW13&/4Y3B)Qrz-d^Lv w$-7Xf[>R' );
define( 'LOGGED_IN_SALT',   '8JtE?]H6q}gwyy,yum*0=qmf{zwT.]602-luAYYpPJ@qsdZ,s&v_Jdx&6G_`ZPLN' );
define( 'NONCE_SALT',       '}>W(-{p2domJ^uR@l8rYI$x[CT@5n23.xhfsa=oi8mqq@Kg&l.>~fys>uE8XlIvb' );

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
