<?php
declare(strict_types=1);

namespace App\Application;

use App\Application\Assembler\ClientDtoAssembler;
use App\Domain\Client\Exception\ClientException;
use App\Domain\Client\Repository\ClientRepositoryInterface;
use App\Domain\Client\ValueObject\ClientId;

class Client implements ClientInterface
{
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function clientById(string $clientId): array
    {
       try {
            $client = $this->repository->get(ClientId::fromString($clientId));
        } catch (\Exception $ex) {
            throw ClientException::notFound($clientId);
        }

        return (new ClientDtoAssembler())->toArray($client);
    }
}