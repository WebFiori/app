<?php

$root = dirname(__DIR__);
fwrite(STDOUT, "Root: ".$root."\n");
require $root . '/vendor/autoload.php';

use WebFiori\Framework\App;

fwrite(STDOUT, "Initializing App...\n");
try {
    App::initiate('App', 'public', $root . '/public');
    App::start();
} catch (\Throwable $e) {
    fwrite(STDOUT, "Error During Initialization: " . $e->getMessage() . "\n");
    exit(1);
}
fwrite(STDOUT, "Done\n");
fwrite(STDOUT, "----------------------------------------------\n");

//TODO: Add Database Connections and run migrations, or remove this block

//fwrite(STDOUT, "Adding Database Connection...\n");
//
// $exitCode = App::getRunner()->setArgsVector([
//     'webfiori',
//     'add:db-connection',
//     '--db-type' => 'mysql',
//     '--host' => getenv('DB_HOST'),
//     '--port' => '3306',
//     '--user' => getenv('DB_USER'),
//     '--password' => getenv('DB_PASS'),
//     '--database' => 'db_name',
//     '--name' => 'my-connection',
//     '--no-check'
// ])->start();

// if ($exitCode != 0) {
//     fwrite(STDOUT, "Error During Initialization. Tests Will not Execute\n");
//     fwrite(STDOUT, "----------------------------------------------\n");
//     exit($exitCode);
// }
// fwrite(STDOUT, "Done\n");
// fwrite(STDOUT, "----------------------------------------------\n");

// fwrite(STDOUT, "Applying Migrations...\n");
// $exitCode = App::getRunner()->setArgsVector([
//     'webfiori',
//     'migrations:fresh',
//     '--connection' => 'my-connection',
//     '--env' => 'dev'
// ])->start();
// if ($exitCode != 0) {
//     fwrite(STDOUT, "Error During Initialization. Tests Will not Execute\n");
//     fwrite(STDOUT, "----------------------------------------------\n");
//     exit($exitCode);
// }

//TODO: Routines after testing. Or Remove
// register_shutdown_function(function () {
    
// });
// fwrite(STDOUT, "----------------------------------------------\n");
fwrite(STDOUT, "Bootstrapping Done\n");
fwrite(STDOUT, "----------------------------------------------\n");
