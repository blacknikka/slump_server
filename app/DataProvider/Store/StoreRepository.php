<?php
declare(strict_types=1);

namespace App\DataProvider\Store;

use \App\DataProvider\Eloquent\Store;

class StoreRepository implements StoreRepositoryInterface
{
    private $store;

    public function __construct(Store $store) {
        $this->store = $store;
    }

    public function getAllData() {
        return $this->store->all();
    }

    public function getOneDataById($id) {
        return $this->store->find($id);
    }

    public function getOneDataByName($name) {
        return $this->store->where('name', $name)->get();
    }
}
