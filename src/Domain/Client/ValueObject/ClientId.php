<?php
declare(strict_types=1);

namespace App\Domain\Client\ValueObject;

use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ClientId
{
    protected $uuid;

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid->toString();
    }

    public static function fromString(string $uuid)
    {
        try {
            return new static(Uuid::fromString($uuid));
        } catch (InvalidUuidStringException $exception) {
            throw new \Exception("ID is not valid");
        }
    }

    public static function next()
    {
        return new static(Uuid::uuid4());
    }
}