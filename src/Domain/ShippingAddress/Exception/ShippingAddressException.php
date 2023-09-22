<?php
declare(strict_types=1);

namespace App\Domain\ShippingAddress\Exception;

use Exception;

class ShippingAddressException extends Exception
{
    public static function maxLimit(): self
    {
        return new self("Max address limit has been reached.");
    }

    public static function minLimit(): self
    {
        return new self("You can't delete last address.");
    }

    public static function defaultAddress(): self
    {
        return new self("You can't delete default address.");
    }

    public static function notFound(string $addressUuid): self
    {
        return new self("Address not found. UUID: $addressUuid");
    }
}
