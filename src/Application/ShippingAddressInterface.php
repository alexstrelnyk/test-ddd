<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Client\ValueObject\ClientId;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;

interface ShippingAddressInterface
{
    public function add(ClientId $clientId, array $data): string;
    public function update(ShippingAddressId $shippingAddressId, array $data): void;
    public function delete(ShippingAddressId $shippingAddressId): void;
    public function getMaxLimit(): int;
}