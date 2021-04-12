<?php

class web
{
    protected $uri;

    public function __construct( string $uri)
    {
        $this->uri = $uri;
    }

    public function match(): bool
    {
        return true;
    }

    public function getUri(): string
    {
        return $this->uri;
    }
}
