<?php
    /**
     * Created by PhpStorm.
     * User: francospringveldt
     * Date: 2017/02/23
     * Time: 8:26 AM
     */
    /* What kind of environment is this: development, test, or live (i.e. production)? */
    define('SS_ENVIRONMENT_TYPE', getenv('SS_ENVIRONMENT_TYPE') ?: 'live');
    /* Database connection */
    //NB: You can substitute getenv() with string values of your choice if you choose.
    define('SS_DATABASE_SERVER', getenv('SS_DATABASE_SERVER'));
    $projectName = getenv('SS_PROJECT_NAME');
    $dbName = sprintf('%s-db', $projectName);
    define('SS_DATABASE_NAME', $dbName);
    define('SS_DATABASE_USERNAME', getenv('SS_DATABASE_USERNAME'));
    define('SS_DATABASE_PASSWORD', getenv('SS_DATABASE_PASSWORD'));
    /* Configure a default username and password to access the CMS on all sites in this environment. */
    define('SS_DEFAULT_ADMIN_USERNAME', getenv('SS_DEFAULT_ADMIN_USERNAME'));
    define('SS_DEFAULT_ADMIN_PASSWORD', getenv('SS_DEFAULT_ADMIN_PASSWORD'));
    $host = sprintf('http://%s', getenv('VIRTUAL_HOST'));
    global $_FILE_TO_URL_MAPPING;
    $_FILE_TO_URL_MAPPING['/var/www/html'] = $host;
    // If we're requesting a different database for testing
    if (isset($_REQUEST['db'])) {
        if (class_exists('PHPUnit_Runner_Version') // If the PHPUnit runner is loaded
            || php_sapi_name() === "cli" // Or we're definitely in CLI mode
            || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'],
                    '/dev/tests') !== false) // Or we're running tests in-browser
        ) {
            global $databaseConfig;
            switch ($_REQUEST['db']) {
                case 'sqlite':
                case 'sqlite3':
                    define('SS_DATABASE_CLASS', 'SQLite3Database');
                    define('SS_SQLITE_DATABASE_PATH', ':memory:');
                    $databaseConfig["path"] = ':memory:';
                    break;
                default:
                    user_error('Unknown database type: ' . $_REQUEST['db'], E_USER_WARNING);
            }
        }
    }
