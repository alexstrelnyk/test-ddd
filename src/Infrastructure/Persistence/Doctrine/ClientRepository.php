<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Client\Entity\Client;
use App\Domain\Client\Repository\ClientRepositoryInterface;
use App\Domain\Client\ValueObject\ClientId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;

final class ClientRepository implements ClientRepositoryInterface
{
    private $entityManager;

    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Client::class);
    }

    public function createQuery(): QueryBuilder
    {
        return $this->repository->createQueryBuilder('c')->select('c');
    }

    public function get(ClientId $clientId): Client
    {
        $client = $this->createQuery()
            ->where('c.uuid = :uuid')
            ->setParameter('uuid', $clientId)
            ->getQuery()
            ->getSingleResult();

        return $client;
    }

}