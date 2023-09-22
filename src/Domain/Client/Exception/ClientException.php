<?php
declare(strict_types=1);

namespace App\Domain\Client\Exception;

use Exception;

class ClientException extends Exception
{
    public static function notFound(string $clientId): self
    {
        return new self("Client not found. UUID: $clientId");
    }
}
