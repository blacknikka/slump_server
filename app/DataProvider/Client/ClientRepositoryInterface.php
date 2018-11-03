<?php
declare(strict_types=1);

namespace App\DataProvider\Client;

interface ClientRepositoryInterface
{
    /**
     * set base data.
     */
    public function setBaseGameData($data);
}
