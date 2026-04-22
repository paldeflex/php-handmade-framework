<?php

namespace PHPFramework;

class Router
{
    public array $routes = [];
    private array $routesParams = [];

    public function __construct(
        protected Request $request,
        protected Response $response
    )
    {
    }

    public function add(string $path, callable|array $callback, array|string $method): self
    {
        $path = trim($path, '/');

        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = [strtoupper($method)];
        }

        $this->routes[] = [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null,
            'method' => $method
        ];

        return $this;
    }

    public function get(string $path, callable|array $callback): self
    {
        return $this->add($path, $callback, 'GET');
    }

    public function post(string $path, callable|array $callback): self
    {
        return $this->add($path, $callback, 'POST');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch(): mixed
    {
        return "Test";
    }

}