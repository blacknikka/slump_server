<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Image\ImageRepositoryInterface;

class ImageService
{
    private $image;

    public function __construct(ImageRepositoryInterface $image) {
        $this->image = $image;
    }

    public function getImageByName($machine_id, $hit_name) {
        return $this->image->getImageByName($machine_id, $hit_name);
    }
}
