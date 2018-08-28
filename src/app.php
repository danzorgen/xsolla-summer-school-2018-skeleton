<?php

use Doctrine\DBAL\DriverManager;
use App\Controller\WarehouseController;
use App\Repository\WarehouseRepository;
use App\Services\WarehouseService;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['db'] = function () {
    return DriverManager::getConnection([
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'warehouse',
        'user' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ]);
};


// init resources

$container['warehouse.controller'] = function ($c) {
    /** @var ContainerInterface $c */
    return new WarehouseController($c->get('warehouse.service'));
};

$container['warehouse.service'] = function ($c) {
    /** @var ContainerInterface $c */
    return new WarehouseService($c->get('warehouse.repository'));
};

$container['warehouse.repository'] = function ($c) {
    /** @var ContainerInterface $c */
    return new WarehouseRepository($c->get('db'));
};


// init routes

$app->group('/api/v1', function () use ($app) {
    $app->get('/warehouses', 'warehouse.controller:getList');
    $app->get('/warehouses/{id}', 'warehouse.controller:getOne');
});