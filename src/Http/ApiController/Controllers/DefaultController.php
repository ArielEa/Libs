<?php

namespace Libs\Http\ApiController\Controllers;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Libs\Http\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction(): Response
    {
        $connectionParams = array(
            'dbname' => 'webstore',
            'user' => 'root',
            'password' => 'eternal673770',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
            'charset'=>'UTF8',
        );

        $config = new Configuration();
        $doctrine = DriverManager::getConnection($connectionParams, $config);

        $sql = "select * from products";

//        $res = $doctrine->query($sql)->fetchAll();

        $queryBuilder = $doctrine->createQueryBuilder();

        $queryBuilder->select('*')
            ->from('products')
            ->where('id = :id')
            ->setParameter('id', 5);

//        $sql = $queryBuilder->getSQL();

        $result = $queryBuilder->execute()->fetchAll();

        lib_dump('Http Host');
        return new JsonResponse(123);
    }
}
