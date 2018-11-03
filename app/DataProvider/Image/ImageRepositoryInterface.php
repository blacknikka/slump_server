<?php
declare(strict_types=1);

namespace App\DataProvider\Image;

interface ImageRepositoryInterface
{
    /**
     * image取得
     */
    public function getImageByName($machine_id, $hit_name);
}
