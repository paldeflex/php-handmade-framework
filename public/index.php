<?php

use PHPFramework\Application;

require_once __DIR__ . '/../config/config.php';
require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

$app = new Application();
dump($app->request);
dump($app->request->isGet());
dump($app->request->isPost());
dump($app->request->isAjax());
dump($app->request->get('page'));
dump(request()->isGet());