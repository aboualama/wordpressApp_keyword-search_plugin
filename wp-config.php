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
define( 'DB_NAME', 'test_wp' );

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
define( 'AUTH_KEY',         '0=rY[)UpOd<uHw&G4~9Pz;.wJ$YCiOuD_c<emt4h_+`^^=nG{V~?aeY+b8~7%vK?' );
define( 'SECURE_AUTH_KEY',  '~^Pa? 3@-;wx}KCV7t,FyT0j/5p$yD,v08z>6z,W^Au Wq@`l-6MhFl_^ZFUBJe=' );
define( 'LOGGED_IN_KEY',    '5 ewidz9}jC|!d/jKJtBJrj$ND|0u2zSOvB12SZVaAu;CcNI?X:gIX.W+GNJRy^ ' );
define( 'NONCE_KEY',        '3#OGuCV(7*jwfb3Dl`5TdwnC9uP9VjuAfCxXlw#Iz,8@#[I*H%ixkb/@Z>-?)]fX' );
define( 'AUTH_SALT',        'z&`l}T+.>HL|,H(MD3mE`v6!,s{_m(+Ef>$F`op-(j~}MDSnApGP]hh?Z0Z[^z_`' );
define( 'SECURE_AUTH_SALT', '9Kr!<B CyL=q{ti]-0Zy*0lV:^[VW`&A`n[8W#6<b|Qrg^00y3${csZmyqGeT(M]' );
define( 'LOGGED_IN_SALT',   '`ZV/yao8VZMuLxN2f7%k8M4{:2Y|}Q>o^l!rcj58o)Qhw~C&06kI`:Gpd2~Qvr*l' );
define( 'NONCE_SALT',       '!]57YhQ89vz[7-@<U?=U_88i@&{7)Tq7m+t!Hm738%kQn@5Sh)fvlUr0Jy{B;lRn' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
