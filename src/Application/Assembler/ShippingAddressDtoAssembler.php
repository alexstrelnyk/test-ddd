<?php
declare(strict_types=1);

namespace App\Application\Assembler;

use App\Application\Dto\ShippingAddressDto;
use App\Domain\Client\Entity\Client;
use App\Domain\ShippingAddress\Entity\ShippingAddress;

class ShippingAddressDtoAssembler
{
    public function toArray(ShippingAddress $address): array
    {
         return [
            'uuid' => (string) $address->uuid()
         ];
    }

    public function fromArray(Client $client, array $data): ShippingAddressDto
    {
        return new ShippingAddressDto($client, $data);
    }

}