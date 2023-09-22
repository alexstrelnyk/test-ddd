<?php
declare(strict_types=1);

namespace App\Application\Dto;

use App\Domain\Client\Entity\Client;

class ShippingAddressDto
{
    private $country;

    private $city;

    private $street;

    private $zipCode;

    private $isDefault;

    private $client;

    public function __construct(Client $client, array $array)
    {
        $this->country = (string) $array['country'];
        $this->city = (string) $array['city'];
        $this->street = (string) $array['street'];
        $this->zipCode = (string) $array['zipCode'];
        $this->isDefault = (bool) $array['isDefault'];
        $this->client = $client;
    }

    public function country(): string
    {
        return $this->country;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function street(): string
    {
        return $this->street;
    }

    public function zipCode(): string
    {
        return $this->zipCode;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function client(): Client
    {
        return $this->client;
    }
}