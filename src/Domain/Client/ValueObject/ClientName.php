<?php
declare(strict_types=1);

namespace App\Domain\Client\ValueObject;

class ClientName
{
    private $firstName;

    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "{$this->firstName()} {$this->lastName()}";
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }
}
