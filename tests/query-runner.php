<?php


use webfiori\framework\App;
/**
 * Run a command to execute certain SQL query on specific database.
 * 
 * This function can be used during bootstrap stage of running unit tests
 * to initialize application's database.
 * 
 * @param string $connection The name of the connection that will be used.
 * It must exist in application configuration.
 * 
 * @param string $queryFileOrSchema A string that represents the namespace of database
 * class (Schema). This will initialize all tables linked to database class.
 * This also can be the path to SQL file to be executed.
 * 
 * @param bool $isFile If set to true, the function will assumes that the
 * previous parameter is SQL file.
 */
function runInitializationQuery(string $connection, string $queryFileOrSchema, bool $isFile = false) {
    if ($isFile) {
        fprintf(STDOUT, "Using file ".$queryFileOrSchema."...\n");
        App::getRunner()->setArgsVector([
            'webfiori',
            'run-query',
            '--no-confirm',
            '--create',
            '--file' => $queryFileOrSchema,
            '--connection' => $connection,
            '--ansi',
        ]);
    } else {
        fprintf(STDOUT, "Using Schema ".$queryFileOrSchema."...\n");
        App::getRunner()->setArgsVector([
            'webfiori',
            'run-query',
            '--no-confirm',
            '--create',
            '--schema' => $queryFileOrSchema,
            '--ansi',
        ]);
    }
    App::getRunner()->start();
}
