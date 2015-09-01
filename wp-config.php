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
define('DB_NAME', 'hotsite-mundial');

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
define('AUTH_KEY',         '*gMe ~gYw[.t`BE+CNj X+OpeINVzBee%l?&~Fpaz%]l<V|>(/O:+Dwwv+LQTqGg');
define('SECURE_AUTH_KEY',  'CNWs}X!Jjv##(JU_~e>,E6V9C@:5M:`8zfM/=*$`^;~mPOGKdsQ02GuWW(4+E0pB');
define('LOGGED_IN_KEY',    't)z7e![okY=;kplj!SeVD521Q`3lTo|gwTE)ME<u23$GNB1zck(C6,ZnWg06/@2|');
define('NONCE_KEY',        'l$H0vl(Rt)zP/=[+r(sD7<7~,ae_A-r9^=$](X?H:d@<^,}mPaE$CA^6&j5K[Hf`');
define('AUTH_SALT',        '-eu+!XZqx}xG3QWs=z7)HE`C<V-TZF2BGYhvjEq48+LmY(lv0bj2|WLb61P??{~y');
define('SECURE_AUTH_SALT', 'ogDmM*D3%9MZw$~UK.CvHc>&0&r%0Ka4kvE:Q{dUTI@OnK@a| eyS/(A6QF.Y*Y^');
define('LOGGED_IN_SALT',   '0@@l5mMazRV}%g!w43|*eB`kd~Fg2&K.-N>SaA197j5E8Z).WGUMtMA}3hpjHq=S');
define('NONCE_SALT',       '[b1?+.sGK5$j-iU!D/ O-&M6k|8x<WY:qExp)J+8r7Y(2o!p{(oM1`dE<rFsPs]3');

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
