<?php

use PHPFramework\Application;

require_once __DIR__ . '/../config/config.php';
require_once ROOT . '/vendor/autoload.php';

$app = new Application();
dump($app);