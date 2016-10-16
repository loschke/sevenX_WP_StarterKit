<?php
/**
 * sevenX - WPDevKit
 * Custom configuration by sevenX
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * Summary:
 * * Initial settings
 * * Path/File settings
 * * Database Setting
 * * FTP Setting
 * * Security Settings
 * * Maintenance/Performance settings
 * * Dev/Debug settings
 * * Theme settings
 */

// #####################################
// Initial settings
// #####################################
/** @var string Directory containing all of the site's files */
$root_dir = dirname(__DIR__);

/** @var string Document Root */
$webroot_dir = $root_dir . '/';

// * Expose global env() function from oscarotero/env
Env::init();

// * Use Dotenv to set required environment variables and load .env file in root
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL']);
}

/**
 * Set up our global environment constant and load its config first
 * Default: dev
 */
$envs = [
	'dev'       => 'http://example.dev',
	'staging'   => 'http://staging.example.com',
	'live'      => 'http://example.com'
];
define('ENVIRONMENTS', serialize($envs));
define('WP_ENV', env('WP_ENV') ?: 'dev');

$env_config = __DIR__ . '/env/' . WP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

// #####################################
// Path/File settings
// #####################################
// * URLs
define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', env('WP_SITEURL'));

// * Custom Content Directory
define('CONTENT_DIR', '/content');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

// #####################################
// Database Setting
// #####################################
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// * Changed for security reasons
$table_prefix = env('DB_PREFIX') ?: '7x_';
define( 'CUSTOM_USER_TABLE',      $table_prefix . 'authorized_user' );
define( 'CUSTOM_USER_META_TABLE', $table_prefix . 'authorized_usermeta' );

// #####################################
// FTP Settings
// #####################################
define( 'FTP_HOST', env('FTP_HOST') );
define( 'FTP_USER', env('FTP_USER') );
define( 'FTP_PASS', env('FTP_PASS') );
define( 'FTP_SSL', 	env('FTP_SSL') );
define( 'FS_METHOD', env('FS_METHOD') );

// #####################################
// Security Settings
// #####################################
// * Generator https://api.wordpress.org/secret-key/1.1/salt
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

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
// * Disable WordPress Auto Updates:
define( 'AUTOMATIC_UPDATER_DISABLED', FALSE );

// * Enable/Disable Core Updates:
define( 'WP_AUTO_UPDATE_CORE', 'minor' ); // true, false

// * Memory Limit
define( 'WP_MEMORY_LIMIT', '128M');

// * Autosave Interval in seconds
define( 'AUTOSAVE_INTERVAL', 60);

// * Limit Post/Page Revisions
define( 'WP_POST_REVISIONS', 6);

// * Enabling Trash for Media Files
define( 'MEDIA_TRASH', TRUE );

// * Disable Media Revisions
define( 'IMAGE_EDIT_OVERWRITE', TRUE );

// * days before WordPress permanently deletes
define( 'EMPTY_TRASH_DAYS', 14);

// * Setup Multi site
define( 'WP_ALLOW_MULTISITE', FALSE);

// * Compression for JS and styles
define( 'CONCATENATE_SCRIPTS', FALSE );
define( 'COMPRESS_SCRIPTS',    FALSE );

// * DB Repair - http://yourwebsite.com/wp-admin/maint/repair.php*/
define('WP_ALLOW_REPAIR', FALSE);

// #####################################
// Dev/Debug settings
// #####################################
// * Instant Debug via URL param: ?debugger=true
if ( isset($_GET['debugger']) && $_GET['debugger'] === 'true') {
    define( 'WP_DEBUG', TRUE );
} else {
    define( 'WP_DEBUG', FALSE );
}
if ( WP_DEBUG ) {
    define('WP_DEBUG_LOG', TRUE); // leave the debug file in WP_CONTENT_DIR . '/debug.log'
    define('WP_DEBUG_DISPLAY', TRUE);
    define('SAVEQUERIES', TRUE); // saves database queries to an array and can be displayed
    define('SCRIPT_DEBUG', TRUE); // non-minified versions of the Javascripts will be used.
    @ini_set('log_errors', 'On');
    @ini_set('display_errors', 'On');
    @ini_set('error_log', $_SERVER['DOCUMENT_ROOT'] . '/logs/php_errors.log');
}

// #####################################
// More setting
// #####################################
define('WP_DEFAULT_THEME', 'twentysixteen');
define('WPLANG', 'de_DE');
define('WPLANG_DIR', 'languages');
define('DISABLE_WP_CRON', env('DISABLE_WP_CRON') ?: false);

// #####################################
// Bootstrap Wordpress
// #####################################
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/core/');
}
