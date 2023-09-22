<?php
declare(strict_types=1);

namespace App\Domain\Client\Repository;

use App\Domain\Client\Entity\Client;
use App\Domain\Client\ValueObject\ClientId;

interface ClientRepositoryInterface
{
    public function get(ClientId $clientId): Client;
}