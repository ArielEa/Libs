<?php

namespace Libs\Http\ApiController\Controllers;

use Libs\Http\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction(): Response
    {
        lib_dump('Http Host');
        return new JsonResponse(123);
    }
}
