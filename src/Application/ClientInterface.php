<?php
declare(strict_types=1);

namespace App\Application;

interface ClientInterface
{
    public function clientById(string $clientId): array;
}