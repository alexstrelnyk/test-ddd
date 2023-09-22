<?php
declare(strict_types=1);

namespace App\Domain\ShippingAddress\Entity;

use App\Application\Dto\ShippingAddressDto;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;

class ShippingAddress
{
    private $uuid;

    private $country;

    private $city;

    private $zipCode;

    private $street;

    private $isDefault;

    private $client;

    public function __construct(ShippingAddressId $uuid, ShippingAddressDto $dto)
    {
        $this->uuid = $uuid;
        $this->country = $dto->country();
        $this->city = $dto->city();
        $this->street = $dto->street();
        $this->zipCode = $dto->zipCode();
        $this->client = $dto->client();
        $this->isDefault = $dto->isDefault();
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function zipCode()
    {
        return $this->zipCode;
    }

    public function street()
    {
        return $this->street;
    }

    public function client()
    {
        return $this->client;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function setDefault()
    {
        $this->isDefault = true;
    }

    public function unsetDefault()
    {
        $this->isDefault = false;
    }

}