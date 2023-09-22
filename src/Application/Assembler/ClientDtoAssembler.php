<?php
declare(strict_types=1);

namespace App\Application\Assembler;

use App\Domain\Client\Entity\Client;

class ClientDtoAssembler
{
    public function toArray(Client $client): array
    {
         return [
            'uuid' => (string) $client->uuid(),
            'firstName' => $client->firstName(),
            'lastName' => $client->lastName(),
        ];
    }

}