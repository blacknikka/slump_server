<?php
declare(strict_types=1);

namespace App\Services\Client;

use App\DataProvider\Client\ClientRepositoryInterface;

class ClientDataService
{
    private $client;

    public function __construct(ClientRepositoryInterface $client) {
        $this->client = $client;
    }

    public function setBaseGameData($data) {
        return $this->client->setBaseGameData($data);
    }
}
