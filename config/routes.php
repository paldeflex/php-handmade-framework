<?php

use PHPFramework\Application;

/** @var Application $app */

$app->router->add('/test', function () {
    return "Hello from test!";
}, ['post', 'get']);

dump($app->router);

