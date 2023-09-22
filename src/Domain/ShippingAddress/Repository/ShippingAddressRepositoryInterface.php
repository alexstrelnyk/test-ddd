<?php
declare(strict_types=1);

namespace App\Domain\ShippingAddress\Repository;

use App\Domain\Client\Entity\Client;
use App\Domain\ShippingAddress\Entity\ShippingAddress;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;

interface ShippingAddressRepositoryInterface
{
    public function get(ShippingAddressId $shippingAddressId): ?ShippingAddress;
    public function save(ShippingAddress $shippingAddress): void;
    public function delete(ShippingAddress $shippingAddress): void;
    public function countOfAddress(Client $client);
    public function defaultByClient(Client $client): ?ShippingAddress;
}