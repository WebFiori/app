<?php

namespace app\ini\routes;

use webfiori\framework\router\Router;

class PagesRoutes {
    /**
     * Initialize system routes.
     * 
     * @since 1.0
     */
    public static function create() {
        Router::page([
            'path' => '/', 
            'route-to' => '/default.html'
        ]);
        Router::page([
            'path' => '/example', 
            'route-to' => \app\pages\ExamplePage::class,
            'case-sensitive' => false,
            'middleware' => [
                'sample-middleware','sample-middleware-2'
            ],
            'methods' => 'get'
        ]);
        Router::incSiteMapRoute();
    }
}
