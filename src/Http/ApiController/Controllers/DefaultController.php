<?php

namespace Libs\Http\ApiController\Controllers;

use Libs\Http\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        return new JsonResponse();
    }
}
