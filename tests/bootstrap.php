<?php

//Bootstrap file which is used to boot testing process.
use webfiori\framework\AutoLoader;
use webfiori\framework\App;

$DS = DIRECTORY_SEPARATOR;

//TODO: Set the name of JSON configuration file to use inrunning test cases.
define('JSON_CONFIG','app-config-testing.json');

//TODO: Set unit tests directory. Update as needed.
define('TESTS_DIRECTORY', 'tests');

//TODO: Set application directory name. Update as needed.
define('APP_DIR', 'app');

//This constant is used to indicate that application is in testing env.
//Leave as is
define('UNIT_TESTING', true);

//an array that contains possible locations at which 
//WebFiori Framework might exist.
//Add and remove directories as needed.
$WebFioriFrameworkDirs = [
    __DIR__.$DS.'webfiori',
    __DIR__.$DS.'vendor'.$DS.'webfiori'.$DS.'framework'.$DS.'webfiori'
];

//Printing informative messages in the terminal
fprintf(STDOUT, "Bootstrap Path: '".__DIR__."'\n");
fprintf(STDOUT,"Tests Directory: '".TESTS_DIRECTORY."'.\n");
fprintf(STDOUT,'Include Path: \''.get_include_path().'\''."\n");
fprintf(STDOUT,"Tryning to load the class 'AutoLoader'...\n");
$isAutoloaderLoaded = false;


if (explode($DS, __DIR__)[0] == 'home') {
    fprintf(STDOUT,"Run Environment: Linux.\n");

    foreach ($WebFioriFrameworkDirs as $dir) {
        //linux 
        $file = $DS.$dir.'framework'.$DS.'AutoLoader.php';
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
        $file = $dir.$DS.'framework'.$DS.'AutoLoader.php';
        fprintf(STDOUT,"Checking if file '$file' is exist...\n");

        if (file_exists($file)) {
            require_once $file;
            $isAutoloaderLoaded = true;
            break;
        }
    }
}

if ($isAutoloaderLoaded === false) {
    fprintf(STDERR, "Error: Unable to find the class 'AutoLoader'.\n");
    exit(-1);
} else {
    fprintf(STDOUT,"Class 'AutoLoader' successfully loaded.\n");
}
fprintf(STDOUT,"Initializing autoload directories...\n");
AutoLoader::get([
    'search-folders' => [
        'tests',
        'webfiori',
        'vendor',
        APP_DIR,
    ],
    'define-root' => true,
    'root' => __DIR__,
    'on-load-failure' => 'do-nothing'
]);
fprintf(STDOUT,'Autoloader Initialized.'."\n");

fprintf(STDOUT,"Initializing application...\n");
define('APP_PATH', AutoLoader::get()->root().$DS.APP_DIR.$DS);
fprintf(STDOUT,'App Path: '.APP_PATH."\n");
App::setConfigDriver('\\webfiori\\framework\\config\\JsonDriver');
App::getConfig()->setConfigFileName('app-config-testing.json');
App::getConfig()->initialize();
App::start();
fprintf(STDOUT,'Done.'."\n");
fprintf(STDOUT,'Root Directory: \''.AutoLoader::get()->root().'\'.'."\n");
define('TESTS_PATH', AutoLoader::get()->root().$DS.TESTS_DIRECTORY);
fprintf(STDOUT,'Stored Connections:'."\n");

foreach (App::getConfig()->getDBConnections() as $conn) {
    fprintf(STDOUT,$conn->getName()."\n");
}
fprintf(STDOUT, "Registering shutdown function...\n");
register_shutdown_function(function()
{
   //TODO: Run extra code after tests completion.   
    
});
fprintf(STDOUT, "Registering shutdown function completed.\n");
require_once 'query-runner.php';

//TODO: Include your own custom bootstrap scripts here.
//require_once 'my-script.php';

fprintf(STDOUT, "Done\n");
fprintf(STDOUT,"Starting to run tests...\n");
