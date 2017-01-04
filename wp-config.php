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
define('DB_NAME', 'wp_bksk_2017');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '6/Rcev0`~mq?^_DD.6R&J(!Py4mJMwHLOdj=Lva~Cd>/1|g_GuzvfoZbb9y-kDk_');
define('SECURE_AUTH_KEY',  'Nx~h;DP6dFZ(iN1*-+l2bzL,tB BC07xQ&T47GiR!yoR:r={C~k37 Hrbt|:0c.K');
define('LOGGED_IN_KEY',    '$DMEV}bieR_&TBEVKoU8L.AmGthzFz%Tx;;SARj;{{}CmS<;bVxyVn6.Il0ccC}z');
define('NONCE_KEY',        '`&7XUGLq]F>yScOBizus*`p@Wa^R(sa47h6%Ocd8j#(_X;Y8C>/%&-F).kC-&db]');
define('AUTH_SALT',        'mqx(W<Y|IYv67P03C,u@ESUO^<ux%8,rE@Gke4;C>1U^`*j)kU(|2@B _;P~KB?g');
define('SECURE_AUTH_SALT', ')87ki?:g+tFop~fvUK8|o$Hm.sZJ8gq2{3Cn>ZYEwn5u$}p&Qe)s9-C)?t+ZWkEE');
define('LOGGED_IN_SALT',   'Cq3L5@U4`:=a&Hew)yfl::Ax=t^jg@dL}9lBYJP^W1Ll)~D~CY@,<fV>zRTky_vm');
define('NONCE_SALT',       'u9k4Mg&HRdHF,6/R22HyZnox5r^&+;:4>*_4tD|ZIp| S7&h3emN?W>5iAf7*RZ1');

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
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
