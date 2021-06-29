<?php

namespace app\ini\routes;

use webfiori\framework\router\Router;
/**
 * A class that only has one method to initiate some of system routes.
 * The class is meant to only initiate the routes which uses the method 
 * Router::api().
 * @author Ibrahim
 * @version 1.0
 */
class APIRoutes {
    /**
     * Create all API routes. Include your own here.
     * @since 1.0
     */
    public static function create() {
        Router::api([
            'path' => '/ExampleAPI/{service-name}', 
            'route-to' => '/ExampleAPI.php'
        ]);
    }
}
