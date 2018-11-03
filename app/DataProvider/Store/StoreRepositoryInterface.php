<?php
declare(strict_types=1);

namespace App\DataProvider\Store;

interface StoreRepositoryInterface
{
    /**
     * データを全て取る
     */
    public function getAllData();

    /**
     * データをIDから取得
     */
    public function getOneDataById($id);

    /**
     * データを名前から取得
     */
    public function getOneDataByName($name);
}
