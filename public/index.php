<?php

namespace WebFiori;

require __DIR__ . '/../vendor/autoload.php';

use WebFiori\Framework\App;

// First parameter is the name of the application directory.
try {
    App::initiate('App', 'public', __DIR__);
    App::start();
    App::handle();
} catch (\Throwable $e) {
    http_response_code(500);
    echo 'Internal Server Error';
}
