<?php

namespace App\Http\Controllers;

use App\Services\StoreService;
use Illuminate\Http\Request;

class StoreDataController extends Controller
{
    private $store;

    public function __construct(StoreService $store) {
        $this->store = $store;
    }

    public function getAllData(Request $request) {
        $data = $this->store->getAllStoresData();
        return [
            'data' => $data,
        ];
    }

    public function getDataById(Request $request) {
        $id = (int)$request->store_id;
        $data = $this->store->getDataByStoreID($id);
        return [
            'id' => $id ? $id: null,
            'data' => $data,
        ];
    }

    public function getOneDataByName(Request $request) {
        $name = $request->name;
        $data = $this->store->getOneDataByName($name);

        $ret = [
            'name' => $name,
            'data' => [],
        ];

        foreach($data as $store) {
            $ret['data'][] = [
                $store
            ];
        }

        return $ret;
    }
}
