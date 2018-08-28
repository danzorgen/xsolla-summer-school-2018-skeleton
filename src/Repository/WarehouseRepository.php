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
        $warehouses = [];

        $rows = $this->dbConnection->executeQuery('
            SELECT id, name, address
            FROM warehouse.warehouse'
        );

        while ($row = $rows->fetch(\PDO::FETCH_ASSOC)) {
            $warehouses[] = new Warehouse($row['id'], $row['name'], $row['address']);
        }

        return $warehouses;
    }

    /**
     * @param int $id
     * @return Warehouse|null
     */
    public function findById($id)
    {
        $row = $this->dbConnection->fetchAssoc('
            SELECT id, name, address
            FROM warehouse.warehouse
            WHERE id = ?',

            [$id]
        );

        return $row['id'] !== null ?
            new Warehouse($row['id'], $row['name'], $row['address']) :
            null;
    }
}