<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Store\StoreRepositoryInterface;

class StoreService
{
    private $store;

    public function __construct(StoreRepositoryInterface $store) {
        $this->store = $store;
    }

    public function getAllStoresData() {
        return $this->store->getAllData();
    }

    public function getDataByStoreID($id) {
        return $this->store->getOneDataById($id);
    }

    public function getOneDataByName($name) {
        return $this->store->getOneDataByName($name);
    }
}
