<?php

namespace App\Services;

use App\Model\Warehouse;
use App\Repository\WarehouseRepository;

class WarehouseService
{
    /**
     * @var WarehouseRepository
     */
    private $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository) {
        $this->warehouseRepository = $warehouseRepository;
    }

    /**
     * @return Warehouse[]
     */
    public function getList()
    {
        return $this->warehouseRepository->getAll();
    }

    /**
     * @param int $id
     * @return Warehouse|null
     */
    public function getOne($id)
    {
        return $this->warehouseRepository->findById($id);
    }
}