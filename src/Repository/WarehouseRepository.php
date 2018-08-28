<?php

namespace App\Repository;

use App\Model\Warehouse;

class WarehouseRepository extends AbstractRepository
{
    /**
     * @return Warehouse[]
     */
    public function getAll()
    {
        return [
            new Warehouse(1, 'name1', 'address1'),
            new Warehouse(2, 'name2', 'address2'),
        ];
    }

    /**
     * @param int $id
     * @return Warehouse|null
     */
    public function findById($id)
    {
        return new Warehouse($id, 'name' . $id, 'address' . $id);
    }
}