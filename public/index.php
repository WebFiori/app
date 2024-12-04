<?php

namespace webfiori;

require '../vendor/autoload.php';

use webfiori\framework\App;
App::initiate('app', 'public', __DIR__);
App::start();
App::handle();
