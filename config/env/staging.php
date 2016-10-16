<?php
/** Staging */
ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
define('STAGE_INFO', true);
define('DEV_MODE', false);
/** Disable all file modifications including updates and update notifications */
define('DISALLOW_FILE_MODS', false);
