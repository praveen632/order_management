<?php
/** 
 *  @author: Anil Shakya
 *  Global Configuration file
 */

session_start();

/**
 *  For development environment: true
 *  For production environment: false
 */
if (!defined('DISPLAY_ERROR')) {
    define('DISPLAY_ERROR', true);
}

/**
 *  Enabling environment as per above setting
 */
if (defined('DISPLAY_ERROR') && (DISPLAY_ERROR == true)) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 1);
    error_reporting(1);
}

/**
 *  Updating ini maximum PHP execution time to unlimited
 */
ini_set('max_execution_time', 0);

/**
 *  Defining main directory path
 */
if (!defined('DIR_PATH')) {
    define('DIR_PATH', dirname(__FILE__) . '/../');
}
/**
 *  Defining config directory path
 */
if (!defined('CONFIG_PATH')) {
    define('CONFIG_PATH', DIR_PATH . 'config/');
}

/**
 *  Defining HOST constants for localhost or any other test server ip
 */

$localhosts = array('localhost');


if (!defined('SERVER_PROTOCOL')) {
    define('SERVER_PROTOCOL', (isset($_SERVER['HTTPS']) && ($_SERVER["HTTPS"] == 'on')) ? 'https' : 'http');
}
if (!defined('HOST')) {
    define('HOST', $_SERVER['HTTP_HOST']);
}
if (!defined('HOST_NAME')) {
    define('HOST_NAME', HOST);
}
/**
 *  Checking if current HOST is localhost
 */
if (in_array(HOST, $localhosts)) {
    if (!defined('IS_LOCALHOST')) {
        define('IS_LOCALHOST', TRUE);
    }
    if(HOST == "localhost") {
        if (!defined('IS_TRUE')) {
            define('IS_TRUE', TRUE);
        }
    } else {
        if (!defined('IS_TRUE')) {
            define('IS_TRUE', FALSE);
        }
    }
} else {
    if (!defined('IS_LOCALHOST')) {
        define('IS_LOCALHOST', FALSE);
    }
    if (!defined('IS_TRUE')) {
        define('IS_TRUE', FALSE);
    }
}

/**
 *  set true to enable error log
 */
if (!defined('ERROR_LOG_DEBUG')) {
    define('ERROR_LOG_DEBUG', true);
}

/**
 *  Defining error log directory path
 */
if (!defined('ERROR_LOG_LOCATION')) {
    define('ERROR_LOG_LOCATION', DIR_PATH. '/logs/error/');
}

/**
 *  Definfing base directory path
 */
if (IS_LOCALHOST && !defined('WWW_PATH')) {
    define('WWW_PATH', SERVER_PROTOCOL . '://' . HOST . '/cms/');
} else {
    define('WWW_PATH', SERVER_PROTOCOL . '://' . HOST . "/");
}

/**
 *  Defining Database config path
 */
if (!defined('DB_PATH')) {
    define('DB_PATH', CONFIG_PATH . 'database/');
}
/**
 *  Defining library path
 */
if (!defined('LIB_PATH')) {
    define('LIB_PATH', DIR_PATH . 'lib/');
}
/**
 *  Defining include directory path
 */
if (!defined('INCLUDE_PATH')) {
    define('INCLUDE_PATH', DIR_PATH . 'include/');
}
if (!defined('WWW_INCLUDE_PATH')) {
    define('WWW_INCLUDE_PATH', WWW_PATH . 'include/');
}


/**
 *  Defining helper directory path
 */
if (!defined('HELPER_PATH')) {
    define('HELPER_PATH', DIR_PATH . 'helpers/');
}
/**
 *  Defining path to public directory
 *  here we will keep all the JS, CSS, Images, Fonts etc. public files
 */
if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', WWW_PATH . 'public/');
}
/**
 *  Defining path to js directory
 *  here we will keep all the JS files
 */
if (!defined('WWW_JS_PATH')) {
    define('WWW_JS_PATH', PUBLIC_PATH . 'js/');
}
/**
 *  Defining path to css directory
 *  here we will keep all the CSS files
 */
if (!defined('WWW_CSS_PATH')) {
    define('WWW_CSS_PATH', PUBLIC_PATH . 'css/');
}
/**
 *  Defining path to images directory
 *  here we will keep all the images
 */
if (!defined('WWW_IMAGE_PATH')) {
    define('WWW_IMAGE_PATH', PUBLIC_PATH . 'images/');
}
/**
 *  Defining path to fonts directory
 *  here we will keep all the font files
 */
if (!defined('WWW_FONT_PATH')) {
    define('WWW_FONT_PATH', PUBLIC_PATH . 'font/');
}
/**
 *  Defining path to custom directory
 *  here we contain some js or css plugin which have js and css files both
 */
if (!defined('WWW_SASS_PATH')) {
    define('WWW_SASS_PATH', PUBLIC_PATH . 'sass/');
}
/**
 *  Defining path to template directory
 */
if (!defined('DIR_TEMPLATE_PATH')) {
    define('DIR_TEMPLATE_PATH', DIR_PATH . 'templates/');
}
if (!defined('WWW_TEMPLATE_PATH')) {
    define('WWW_TEMPLATE_PATH', WWW_PATH . 'templates/');
}

/**
 *  Defining path to common directory
 */
if (!defined('DIR_COMMON_PATH')) {
    define('DIR_COMMON_PATH', DIR_PATH . 'common/');
}
if (!defined('WWW_COMMON_PATH')) {
    define('WWW_COMMON_PATH', WWW_PATH . 'common/');
}

/**
 *  Defining path to Userdata directory
 *  here we will keep all user related data files
 */
if (!defined('WWW_USERDATA_PATH')) {
    define('WWW_USERDATA_PATH', WWW_PATH . 'user_data/');
}


if (!defined('DIR_USERDATA_PATH')) {
    define('DIR_USERDATA_PATH', DIR_PATH . 'user_data/');
}

if(IS_LOCALHOST == true) {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cms');
    define('DB_USER', 'root');
    define('DB_PASS', '');

} else {
	

	if(HOST_NAME == 'editeur.kwixx.fr') { 
		define('DB_HOST', 'sql8543.phpnet.org');
		define('DB_NAME', 'kwixx');
		define('DB_USER', 'kwixx');
		define('DB_PASS', 'prodkwixx123');
	} else if(HOST_NAME == 'admin.cantalpecheloisirs.fr') {
		define('DB_HOST', 'sql8543.phpnet.org');
		define('DB_NAME', 'cantalpeche');
		define('DB_USER', 'cantalpeche');
		define('DB_PASS', 'dmdgGhKivQ4z');
	}
}
           
