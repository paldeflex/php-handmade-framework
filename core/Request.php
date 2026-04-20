<?php

namespace PHPFramework;

class Request
{
    public function __construct(
        public string $uri
    )
    {
        $this->uri = trim(urldecode($uri), '/');
    }

}