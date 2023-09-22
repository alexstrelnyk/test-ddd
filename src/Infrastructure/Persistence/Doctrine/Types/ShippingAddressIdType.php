<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Types;

use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use InvalidArgumentException;
use Ramsey\Uuid\Doctrine\UuidType;

class ShippingAddressIdType extends UuidType
{
    const NAME = 'uuid_address';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof ShippingAddressId) {
            return $value;
        }

        try {
            $uuid = ShippingAddressId::fromString($value);
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

        if ($value instanceof ShippingAddressId) {
            return (string) $value;
        }

        throw ConversionException::conversionFailed($value, static::NAME);
    }

}