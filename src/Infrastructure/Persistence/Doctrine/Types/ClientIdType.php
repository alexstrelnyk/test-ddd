<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Types;

use App\Domain\Client\ValueObject\ClientId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use InvalidArgumentException;
use Ramsey\Uuid\Doctrine\UuidType;

class ClientIdType extends UuidType
{
    const NAME = 'uuid_client';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof ClientId) {
            return $value;
        }

        try {
            $uuid = ClientId::fromString($value);
        } catch (InvalidArgumentException $exception) {
            throw ConversionException::conversionFailed($value, static::NAME);
        }

        return $uuid;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof ClientId) {
            return (string) $value;
        }

        throw ConversionException::conversionFailed($value, static::NAME);
    }

}