<?php
declare(strict_types=1);

namespace App\Domain\Client\Entity;

use App\Domain\Client\ValueObject\ClientId;
use App\Domain\Client\ValueObject\ClientName;
use Doctrine\Common\Collections\ArrayCollection;

class Client
{
    private $uuid;

    private $firstName;

    private $lastName;

    private $shippingAddresses;

    public function __construct(ClientId $uuid, ClientName $clientName)
    {
        $this->uuid = $uuid;
        $this->firstName = $clientName->firstName();
        $this->lastName = $clientName->lastName();
        $this->shippingAddresses = new ArrayCollection();
    }

    public function uuid(): ?ClientId
    {
        return $this->uuid;
    }

    public function firstName(): ?string
    {
        return $this->firstName;
    }

    public function lastName(): ?string
    {
        return $this->lastName;
    }

}