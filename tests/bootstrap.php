<?php

//Bootstrap file which is used to boot testing process.
use webfiori\framework\autoload\ClassLoader;
use webfiori\framework\App;

$DS = DIRECTORY_SEPARATOR;

//TODO: Set the name of JSON configuration file to use inrunning test cases.
define('JSON_CONFIG','app-config-testing.json');


//TODO: Set application directory name. Update as needed.
define('APP_DIR', 'app');

//This constant is used to indicate that application is in testing env.
//Leave as is
define('UNIT_TESTING', true);

$Root = substr(__DIR__, 0, strlen(__DIR__) - strlen('tests'));

//an array that contains possible locations at which 
//WebFiori Framework might exist.
//Add and remove directories as needed.
$WebFioriFrameworkDirs = [
    $Root.$DS.'webfiori',
    $Root.$DS.'vendor'.$DS.'webfiori'.$DS.'framework'.$DS.'webfiori'
];

//Printing informative messages in the terminal
fprintf(STDOUT, "Bootstrap Path: '".__DIR__."'\n");
fprintf(STDOUT, "Root Path: '".$Root."'\n");
fprintf(STDOUT,'Include Path: \''.get_include_path().'\''."\n");
fprintf(STDOUT,"Tryning to load the class 'ClassLoader'...\n");
$isAutoloaderLoaded = false;


if (explode($DS, __DIR__)[0] == 'home' || explode($DS, __DIR__)[1] == 'home') {
    fprintf(STDOUT,"Run Environment: Linux.\n");

    foreach ($WebFioriFrameworkDirs as $dir) {
        //linux 
        $file = $DS.$dir.$DS.'framework'.$DS.'autoload'.$DS.'ClassLoader.php';
        fprintf(STDOUT,"Checking if file '$file' is exist...\n");

        if (file_exists($file)) {
            require_once $file;
            $isAutoloaderLoaded = true;
            break;
        }
    }
} else {
    fprintf(STDOUT,"Run Environment: Other.\n");

    foreach ($WebFioriFrameworkDirs as $dir) {
        //other
        $file = $dir.$DS.'framework'.$DS.'autoload'.$DS.'ClassLoader.php';
        fprintf(STDOUT,"Checking if file '$file' is exist...\n");

        if (file_exists($file)) {
            require_once $file;
            $isAutoloaderLoaded = true;
            break;
        }
    }
}

if ($isAutoloaderLoaded === false) {
    fprintf(STDERR, "Error: Unable to find the class 'ClassLoader'.\n");
    exit(-1);
} else {
    fprintf(STDOUT,"Class 'ClassLoader' successfully loaded.\n");
}
fprintf(STDOUT,"Initializing autoload directories...\n");
ClassLoader::get([
    'search-folders' => [
        'tests',
        'webfiori',
        'vendor',
        APP_DIR,
    ],
    'define-root' => true,
    'root' => $Root,
    'on-load-failure' => 'do-nothing'
]);
fprintf(STDOUT,'Autoloader Initialized.'."\n");

fprintf(STDOUT,"Initializing application...\n");
define('APP_PATH', ClassLoader::get()->root().$DS.APP_DIR.$DS);
fprintf(STDOUT,'App Path: '.APP_PATH."\n");
$driver = "\\webfiori\\framework\\config\\JsonDriver";
fprintf(STDOUT,"Setting application configuration driver to '$driver'\n");
App::setConfigDriver($driver);
$configFileName = 'app-config-testing.json';
fprintf(STDOUT,"Setting application configuration file to '$configFileName'\n");
App::getConfig()->setConfigFileName($configFileName);
App::getConfig()->initialize();
App::start();
fprintf(STDOUT,'Done.'."\n");
fprintf(STDOUT,'Root Directory: \''.ClassLoader::get()->root().'\'.'."\n");
define('TESTS_PATH', ClassLoader::get()->root().$DS.'tests');
fprintf(STDOUT,'Stored Connections:'."\n");
if (count(App::getConfig()->getDBConnections()) != 0) {
    foreach (App::getConfig()->getDBConnections() as $conn) {
        fprintf(STDOUT, $conn->getName()."\n");
    }
} else {
    fprintf(STDOUT, "<<NO DATABSE CONNECTIONS>>\n");
}
fprintf(STDOUT, "Registering shutdown function...\n");
register_shutdown_function(function()
{
   //TODO: Run extra code after tests completion. 
    fprintf(STDOUT, "Testing Finished.\n");
});
fprintf(STDOUT, "Registering shutdown function completed.\n");
require_once 'query-runner.php';

//TODO: Include your own custom bootstrap scripts here.
//require_once 'my-script.php';

fprintf(STDOUT, "Done\n");
fprintf(STDOUT,"Starting to run tests...\n");