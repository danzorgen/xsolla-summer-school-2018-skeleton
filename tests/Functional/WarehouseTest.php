<?php

namespace App\Tests\Functional;

class WarehouseTest extends ApiTestCase
{
    public function testGetList()
    {
        $this->request('GET', '/api/v1/warehouses');

        $this->assertThatResponseHasStatus(200);
        $this->assertThatResponseHasContentType('application/json');
        $this->assertCount(3, $this->responseData());

        $this->assertEquals(
            [
                ['id' => '1', 'name' => 'name1', 'address' => 'address1'],
                ['id' => '2', 'name' => 'name2', 'address' => 'address2'],
                ['id' => '3', 'name' => 'name3', 'address' => 'address3'],
            ],
            $this->responseData()
        );
    }

    public function testGetOne()
    {
        $this->request('GET', '/api/v1/warehouses/1');

        $this->assertThatResponseHasStatus(200);
        $this->assertThatResponseHasContentType('application/json');

        $this->assertEquals(
            ['id' => '1', 'name' => 'name1', 'address' => 'address1'],
            $this->responseData()
        );
    }
}