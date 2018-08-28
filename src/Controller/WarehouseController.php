<?php

namespace App\Controller;

use App\Services\WarehouseService;
use Slim\Http\Request;
use Slim\Http\Response;

class WarehouseController
{
    /**
     * @var WarehouseService
     */
    private $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function getList(Request $request, Response $response)
    {
        $warehouses = $this->warehouseService->getList();

        $jsonResponse = [];

        foreach ($warehouses as $warehouse) {
            $jsonResponse[] = [
                'id' => $warehouse->getId(),
                'name' => $warehouse->getName(),
                'address' => $warehouse->getAddress()
            ];
        }

        return $response->withJson(
            $jsonResponse,
            200
        );
    }

    public function getOne(Request $request, Response $response, $args)
    {
        $warehouse = $this->warehouseService->getOne($args['id']);

        if ($warehouse === null) {
            return $response->withJson(
                [
                    'error' => 'Товар не найден'
                ],
                404
            );
        }

        return $response->withJson(
            [
                'id' => $warehouse->getId(),
                'name' => $warehouse->getName(),
                'address' => $warehouse->getAddress()
            ],
            200
        );
    }
}