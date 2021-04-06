<?php

namespace MethodRequest\lib\Qimen;

class RequestFactory
{
    public function __construct()
    {
    }

    public function handle()
    {
        return "";
    }

    private function getInstance(string $postType): RequestInterface
    {
        if (ObjectInstance::has($postType)) {
            return ObjectInstance::get($postType);
        }
//        switch ($postType) {
//            case ObjectInstance::
//        }
    }
}
