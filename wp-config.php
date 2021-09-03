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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce' );

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
define( 'AUTH_KEY',         'Zn(oJmRZ Rge}YS1:cY*Vwx,z  h+*,wC8ESJs_$5tD#Cd7-nj&^ES! }.(:;%[n' );
define( 'SECURE_AUTH_KEY',  '2LJZBo}XvJ(ndtLR4~nEf-pVAB]$&YL]rRaur]kD>$S<iM}/6Eh9|jTRpRy!&W55' );
define( 'LOGGED_IN_KEY',    'LX2#p{!O^|iTl)/Mx(p5OyBC;#y3ii$x~,.G2U//+S^QuL;&aG]q-,6PPw^^3p@+' );
define( 'NONCE_KEY',        'y+8m|@xu3VLm&pUwa9t@/fqmZvhLei}W/gRJo~cKdH~nkH}sJU>]*Mi&b{t-x].b' );
define( 'AUTH_SALT',        '6|&#3 <7JR>Q(@[,!w+ uCcx#Ulwd1LDzquUyLM}Z}=G^lDNI=mu-O4TN.t*+|GK' );
define( 'SECURE_AUTH_SALT', 'c^K,L [a+TGQ9!CtSdq)`Wa5_`CFtD4tt~7iHP?OHc_ZTUs}c)W;<j9q~GX}@zpw' );
define( 'LOGGED_IN_SALT',   '71/VO9&-._{2l<)QQVYl !rK>NIimu,{:&}Q`7l@6S^|h<IEfX^I.1Ln@@}iCHTs' );
define( 'NONCE_SALT',       'Q]@(Sh!+`{YfN>+I-*u@H^)0$-$=zE{G{dWhVM(<rPH([Wu*S|?HE_e!BOqE4;/&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ewp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
