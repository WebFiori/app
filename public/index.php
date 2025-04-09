<?php

namespace webfiori;

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use webfiori\framework\App;
App::initiate('app', 'public', __DIR__);
App::start();
App::handle();
