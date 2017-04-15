<?php
/**
 * sevenX - WP Themes Collection
 * Custom configuration for sevenX Wordpress Themes
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * Summary:
 * * Database settings
 * * FTP/Proxy settings
 * * Security settings
 * * Maintenance/Performance settings
 * * Dev/Debug settings
 * * Path/Folder settings
 *
 * Sources/Links:
 * * https://gist.github.com/loschke/8719e6d0e81bc3e74126
 */

// #####################################
// Database Setting
// #####################################

// Database setting including local config check
if ( file_exists( dirname( __FILE__ ) . '/wp-config-dev.php' ) ) {

	include( dirname( __FILE__ ) . '/wp-config-dev.php' );
	define( 'WP_LOCAL_DEV', true );

} else {

	// Database Access data
	define( 'DB_NAME',     'db_anme' );
	define( 'DB_USER',     'db_username' );
	define( 'DB_PASSWORD', 'db_password' );
	define( 'DB_HOST',     'db_host' );
	define( 'DB_CHARSET',  'utf8' );
	define( 'DB_COLLATE',  '' );

}

// Database Table settings.
// * Changed for security reasons OR
// * Only numbers, letters, and underscores please!
$table_prefix  = 'foo_';
define( 'CUSTOM_USER_TABLE',      $table_prefix . 'authorized_user' );
define( 'CUSTOM_USER_META_TABLE', $table_prefix . 'authorized_usermeta' );
/**/

// #####################################
// FTP/Proxy Settings
// #####################################

// FTP Access data
define( 'FTP_HOST', 'ftp.yourwebsite.com' );
define( 'FTP_USER', 'username123' );
define( 'FTP_PASS', 'password123' );
define( 'FTP_SSL', 	FALSE );
/**/

// FTP Method
define( 'FS_METHOD', 'direct' );
/**/

/*
// optional FTP settings
define('FTP_BASE', '...');
define('FTP_CONTENT_DIR', '...');
define('FTP_PLUGIN_DIR', '...');
/**/

/*
// Proxy Settings -> optional
define( 'WP_PROXY_HOST', '10.28.123.4' );
define( 'WP_PROXY_PORT', '8080' );
define( 'WP_PROXY_USERNAME', 'johndoe );
define( 'WP_PROXY_PASSWORD', 'johnspassword' );
define( 'WP_PROXY_BYPASS_HOSTS', 'localhost' );
/**/

// #####################################
// Security Settings
// #####################################

// Salts settings
// * Generator https://api.wordpress.org/secret-key/1.1/salt
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );
/**/

/*
// secure logins and dashboard, passwords and cookies are never sent in the clear
define('FORCE_SSL_ADMIN', TRUE);
define('FORCE_SSL_LOGIN', TRUE);
/**/

/*
// Enabling/Disabling theme/plugin editor
define( 'DISALLOW_FILE_EDIT', TRUE );
/**/

/*
// Disallow anything that creates, deletes, or edits core, plugin, or theme files.
define( 'DISALLOW_FILE_MODS', TRUE );
/**/

/*
// Disallow unfiltered_html for all users, even admins and super admins
define( 'DISALLOW_UNFILTERED_HTML', TRUE );
/**/

/*
// Allow uploads of filtered file types to users with administrator role
define( 'ALLOW_UNFILTERED_UPLOADS', FALSE );
/**/

// #####################################
// Maintenance/Performance settings
// #####################################

//Disable WordPress Auto Updates:
define( 'AUTOMATIC_UPDATER_DISABLED', FALSE );
/**/

// Enable/Disable Core Updates:
define( 'WP_AUTO_UPDATE_CORE', 'minor' ); // true, false
/**/

// Memory Limit
define( 'WP_MEMORY_LIMIT', '128M');
/**/

// Autosave Interval in seconds
define( 'AUTOSAVE_INTERVAL', 60);
/**/

// Limit Post/Page Revisions
define( 'WP_POST_REVISIONS', 6);
/**/

// Enabling Trash for Media Files
define( 'MEDIA_TRASH', TRUE );
/**/

// Disable Media Revisions
define( 'IMAGE_EDIT_OVERWRITE', TRUE );
/**/

// days before WordPress permanently deletes
define( 'EMPTY_TRASH_DAYS', 14);
/**/

// Setup Multi site
define( 'WP_ALLOW_MULTISITE', FALSE);
/**/

// Compression for JS and styles
define( 'CONCATENATE_SCRIPTS', FALSE );
define( 'COMPRESS_SCRIPTS',    FALSE );
/**/

// DB Repair - http://yourwebsite.com/wp-admin/maint/repair.php*/
define('WP_ALLOW_REPAIR', FALSE);

/*
// Language Settings
define( 'WPLANG', 'en_US');
define( 'WPLANG_DIR', 'languages');
/**/

// #####################################
// Dev/Debug settings
// #####################################

// Instant Debug via URL param: ?debugger=true
if ( isset($_GET['debugger']) && $_GET['debugger'] === 'true') {
	define( 'WP_DEBUG', TRUE );
} else {
	define( 'WP_DEBUG', FALSE );
}

if ( WP_DEBUG ) {
	define( 'WP_DEBUG_LOG', 		TRUE ); // leave the debug file in WP_CONTENT_DIR . '/debug.log'
	define( 'WP_DEBUG_DISPLAY', 	TRUE );
	define(	'SAVEQUERIES', 			TRUE ); // saves database queries to an array and can be displayed
	define( 'SCRIPT_DEBUG', 		TRUE ); // non-minified versions of the Javascripts will be used.

	@ini_set( 'log_errors', 		'On' );
	@ini_set( 'display_errors', 'On' );
	@ini_set( 'error_log', $_SERVER['DOCUMENT_ROOT'] . '/logs/php_errors.log' );
}

// #####################################
// Path/File settings
// #####################################

/*
// automatically adopted during installation
// * Wordpress Home URL
define( 'WP_SITEURL', 'http://yourwebsite.com' );

// * URL to the WordPress root dir
define( 'WP_HOME', 'http://yourwebsite.com' );
/**/

/*
// Custom content directories
define( 'WP_CONTENT_DIR',  dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL',  'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

// Custom plugin directory
define( 'WP_PLUGIN_DIR',   dirname( __FILE__ ) . '/wp-plugins' );
define( 'WP_PLUGIN_URL',   'http://' . $_SERVER['HTTP_HOST'] . '/wp-plugins' );

// Custom mu plugin directory
define( 'WPMU_PLUGIN_DIR', dirname( __FILE__ ) . '/wpmu-plugins' );
define( 'WPMU_PLUGIN_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wpmu-plugins' );
/**/

//  Stop editing! Happy blogging. */
// * Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// * Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
