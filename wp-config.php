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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'gUZ(|AH3n*EARzFB-Ice}3pNDHTM)M(e*4*5$&?W7&zF`?[t>RFB7knUlz.t4#xK' );
define( 'SECURE_AUTH_KEY',  '|&WuDAz1JfB^`9MeR5:?[h/&q;S-cz^N|I;70--N^N@&@)x.TNNOqA#,ZrnM%{2h' );
define( 'LOGGED_IN_KEY',    '[kRSrJ:;eJ ,<</}!,b@6KX<KXBdA|#FCV=mHt/JXZ69brl9l%IHp<jCjyyZ~kua' );
define( 'NONCE_KEY',        'a@MSo*FuL4;Xa|:o4-&5JVDLxL{,kCjsf=(J{#ts$S(~I<Jfxg;owVua8#;Alk(>' );
define( 'AUTH_SALT',        '`x/A4T.Yt9o(k(=X(<R&~J98su}HS/_~VW}j4Sgy98TO|x2l5eg9/d:Ag1$r8l.C' );
define( 'SECURE_AUTH_SALT', 'Z@%?Oz;)a2yOdHZ%4Oc1Ggteo5PZ2c)Rj|Kg~58D<,$<D0=Db1=@CL{p;W-l3^o^' );
define( 'LOGGED_IN_SALT',   ';ICeZ6;an[31_87ecGq=u2RmEV+5 <| {BKLQE)i1t?wDzf7efwV>61$^(=aV)M/' );
define( 'NONCE_SALT',       '=GR)5nT9{aT%R@3`ZzZ5}/DyZh4QE 1>f6TIC29Z>UN$O}Ev0=sX M KO)@V|P->' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
