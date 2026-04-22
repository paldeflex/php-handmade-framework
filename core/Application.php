<?php

namespace PHPFramework;

class Application
{
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request($_SERVER['REQUEST_URI']);
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(): void
    {
        echo $this->router->dispatch();
    }
}