<?php

namespace App\Tests\Client;

use App\Application\ClientInterface;
use App\Domain\Client\Entity\Client;
use App\Domain\Client\Exception\ClientException;
use App\Domain\Client\ValueObject\ClientName;
use App\Tests\UnitTest;
use App\Domain\Client\ValueObject\ClientId;

class ClientTest extends UnitTest
{
    public function testClientById()
    {
        /** @var ClientInterface $client */
        $client = $this::$container->get(ClientInterface::class);

        $clientEntity = $this->createFakeClient();

        $clientData = $client->clientById($clientEntity->uuid());

        $this->assertEquals($clientEntity->uuid(), $clientData['uuid']);
        $this->assertEquals($clientEntity->firstName(), $clientData['firstName']);
        $this->assertEquals($clientEntity->lastName(), $clientData['lastName']);
    }

    public function testClientByIdNotFound()
    {
        /** @var ClientInterface $client */
        $client = $this::$container->get(ClientInterface::class);

        $this->expectException(ClientException::class);

        $client->clientById(ClientId::next());
    }
}