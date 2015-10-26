<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// If 'wp-config-local.php' exists, use those settings
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
  include( dirname( __FILE__ ) . '/wp-config-local.php' );

// Otherwise use the below settings (live server)
} else {

// ** Server Settings: ** //

/** The name of the database for WordPress */
define('DB_NAME', 'dbname');

/** MySQL database username */
define('DB_USER', 'dbuser');

/** MySQL database password */
define('DB_PASSWORD', 'dbpass');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST']);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content');

} // /else

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bPB~4hm7Fv)+Av0ze{Z $o<G!WjliCQo_m*y}e|V:9nPSHOGJ7Ay<-%Lij>#nEi8');
define('SECURE_AUTH_KEY',  'S+?=maw-w`vR|2A8:^j- qk}[:Q0hhKAqa8tWK$F?-SZNjG77`|9>[+0Uif]:D+u');
define('LOGGED_IN_KEY',    '/kQ]6KBEt21;}l:+u-eC7/=z44e)s~?uh=ROOcVy8C{=G- )||d#_XdGusKwj3WF');
define('NONCE_KEY',        'ZD`=3Jdj{MmU~|rB/+(r{(q`fna!<V.|(*AiuyAN$E@*-hl-r>:*6hy3J-X?jmhE');
define('AUTH_SALT',        'O1ql;ODY}$*BD},sP3Oyzd34CiDt*m~zPzBj}Jbe8lNRQNVN8+.Uje$F(B8=<bqO');
define('SECURE_AUTH_SALT', '+B{y7b-OUakN=T4eRcqmw&n; fW]G/Wwr+IrokDR9:C2;88< SS/-{5ty Lj;yM`');
define('LOGGED_IN_SALT',   'Ybi+%7{Ck~$XOjv30#KXh<ek!Db=S( >Bs<{v9VPtf6+=k9oq;ISRpG{q=RGu`.l');
define('NONCE_SALT',       'U^!1N~pdHs_!SBbl1bO?xkfWv3{[Eq0y)rIVE/VsrxFts-XIYX|74X[gS3^v+:l=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
