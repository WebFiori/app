<?php

namespace app\ini;
/**
* A class which is used to initialize global constants.
* 
* This class has one static method which is used to define the constants.
* The class can be used to initialize any constant that the application depends
* on. The constants that this class will initialize are the constants which
* uses the function <code>define()</code>.
* Also, the developer can modify existing ones as needed to change some of the
* default settings of the framework.
* 
* @since 1.1.0
*/
class GlobalConstants {
    /**
     * Initialize the constants.
     * 
     * Include your own in the body of this method or modify existing ones
     * to suite your configuration. It is recommended to check if the global
     * constant is defined or not before defining it using the function
     * <code>defined</code>.
     * 
     * @since 1.0
     */
    public static function defineConstants() {
        if (!defined('SCRIPT_MEMORY_LIMIT')){
            /**
             * Memory limit per script.
             * 
             * This constant represents the maximum amount of memory each script will 
             * consume before showing a fatal error. Default value is 2GB. The 
             * developer can change this value as needed.
             * 
             * @var string
             * 
             * @since 1.0
             * 
             */
            define('SCRIPT_MEMORY_LIMIT', '2048M');
        }
        if (!defined('WF_SESSION_STORAGE')){
            /**
             * A constant which holds the class name of sessions storage 
             * engine alongside its namespace.
             * 
             * The value of this constant is used to configure session storage 
             * engine. For example, if the name of the class that represents 
             * storage engine is 'MySessionStorage' and the class exist in the 
             * namespace 'extras\util', then the value of the constant should be 
             * '\extras\util\MySessionStorage'. To use database session storage 
             * set this constant to the value '\webfiori\framework\session\DatabaseSessionStorage'.
             * 
             * @var string
             * 
             * @since 2.1.0
             * 
             */
            define('WF_SESSION_STORAGE', '\webfiori\framework\session\DefaultSessionStorage');
        }
        if (!defined('DATE_TIMEZONE')){
            /**
             * Define the timezone at which the system will operate in.
             * 
             * The value of this constant is passed to the function 'date_default_timezone_set()'. 
             * This one is used to fix some date and time related issues when the 
             * application is deployed in multiple servers.
             * See http://php.net/manual/en/timezones.php for supported time zones.
             * Change this as needed.
             * 
             * @var string
             * 
             * @since 1.0
             * 
             */
            define('DATE_TIMEZONE', 'Asia/Riyadh');
        }
        if (!defined('PHP_INT_MIN')){
            /**
             * Fallback for older php versions that does not support the constant 
             * PHP_INT_MIN.
             * 
             * @var int
             * 
             * @since 1.0
             * 
             */
            define('PHP_INT_MIN', ~PHP_INT_MAX);
        }
        if (!defined('LOAD_COMPOSER_PACKAGES')){
            /**
             * This constant is used to tell the core if the application uses composer 
             * packages or not.
             * 
             * If set to true, then composer packages will be loaded.
             * 
             * @var boolean
             * 
             * @since 1.0
             * 
             */
            define('LOAD_COMPOSER_PACKAGES', true);
        }
        if (!defined('CRON_THROUGH_HTTP')){
            /**
             * A constant which is used to enable or disable HTTP access to cron.
             * 
             * If the constant value is set to true, the framework will add routes to the 
             * components which is used to allow access to cron control panel. The control 
             * panel is used to execute jobs and check execution status. Default value is false.
             * 
             * @var boolean
             * 
             * @since 1.0
             * 
             */
            define('CRON_THROUGH_HTTP', false);
        }
        if (!defined('WF_VERBOSE')){
            /**
             * This constant is used to tell the framework if more information should 
             * be displayed if an exception is thrown or an error happens.
             * 
             * The main aim 
             * of this constant is to hide some sensitive information from users if the 
             * system is in production environment. Note that the constant will have effect 
             * only if the framework is accessed through HTTP protocol. If used in CLI 
             * environment, everything will appear. Default value of the constant is 
             * false.
             * 
             * @var boolean
             * 
             * @since 1.0
             * 
             */
            define('WF_VERBOSE', false);
        }
        if (!defined('NO_WWW')){
            /**
             * This constant is used to redirect a URI with www to non-www.
             * 
             * If this constant is defined and is set to true and a user tried to 
             * access a resource using a URI that contains www in the host part,
             * the router will send a 301 - permanent redirect HTTP response code and 
             * send the user to non-www host. For example, if a request is sent to 
             * 'https://www.example.com/my-page', it will be redirected to 
             * 'https://example.com/my-page'. Default value of the constant is false which 
             * means no redirection will be performed.
             * 
             * @var boolean
             * 
             * @since 1.0
             * 
             */
            define('NO_WWW', false);
        }
        if (!defined('MAX_BOX_MESSAGES')){
            /**
             * The maximum number of message boxes to show in one page.
             * 
             * A message box is a box which will be shown in a web page that 
             * contains some information. The 
             * box can be created manually by using the method 'Util::print_r()' or 
             * it can be as a result of an error during execution.
             * Default value is 15. The developer can change the value as needed. Note 
             * that if the constant is not defined, the number of boxes will 
             * be almost unlimited.
             * 
             * @var int
             * 
             * @since 1.0
             * 
             */
            define('MAX_BOX_MESSAGES', 15);
        }
        if (!defined('CLI_HTTP_HOST')){
            /**
             * Host name to use in case the system is executed through CLI.
             * 
             * When the application is running throgh CLI, there is no actual 
             * host name. For this reason, the host is set to 127.0.0.1 by default. 
             * If this constant is defined, the host will be changed to the value of 
             * the constant. Default value of the constant is 'example.com'.
             * 
             * @var string
             * 
             * @since 1.0
             * 
             */
            define('CLI_HTTP_HOST', 'example.com');
        }
        if (!defined('DS')){
            /**
             * Directory separator.
             * 
             * This one is is used as a shorthand instead of using PHP 
             * constant 'DIRECTORY_SEPARATOR'. The two will have the same value.
             * 
             * @var string
             * 
             * @since 1.0
             * 
             */
            define('DS', DIRECTORY_SEPARATOR);
        }
        if (!defined('THEMES_PATH')){
            $themesDirName = 'themes';
            $themesPath = substr(__DIR__, 0, strlen(__DIR__) - strlen(APP_DIR_NAME.'/ini')).DIRECTORY_SEPARATOR.$themesDirName;
            /**
             * This constant represents the directory at which themes exist.
             * 
             * @var string
             * 
             * @since 1.0
             * 
             */
            define('THEMES_PATH', $themesPath);
        }
        if (!defined('USE_HTTP')){
            /**
             * Sets the framework to use 'http://' or 'https://' for base URIs.
             * 
             * The default behaviour of the framework is to use 'https://'. But 
             * in some cases, there is a need for using 'http://'.
             * If this constant is set to true, the framework will use 'http://' for 
             * base URI of the system. Default value is false.
             * 
             * @var boolean
             * 
             * @since 1.0
             * 
             */
            define('USE_HTTP', false);
        }
    }
}
