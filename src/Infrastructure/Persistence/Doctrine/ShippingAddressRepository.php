<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Client\Entity\Client;
use App\Domain\ShippingAddress\Entity\ShippingAddress;
use App\Domain\ShippingAddress\Repository\ShippingAddressRepositoryInterface;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;

class ShippingAddressRepository implements ShippingAddressRepositoryInterface
{
    private $entityManager;

    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(ShippingAddress::class);
    }

    public function createQuery(): QueryBuilder
    {
        return $this->repository->createQueryBuilder('a');
    }

    public function defaultByClient(Client $client): ?ShippingAddress
    {
        return $this->createQuery()
            ->select('a')
            ->andWhere('a.client = :client')
            ->andWhere('a.isDefault = :isDefault')
            ->setParameters([ 'client' => $client, 'isDefault' => true ])
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function countOfAddress(Client $client)
    {
        return $this->createQuery()
            ->select('count(a.uuid)')
            ->andWhere('a.client = :client')
            ->setParameter('client', $client)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function get(ShippingAddressId $shippingAddressId): ?ShippingAddress
    {
        return $this->createQuery()
            ->select('a')
            ->andWhere('a.uuid = :uuid')
            ->setParameter('uuid', $shippingAddressId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function save(ShippingAddress $shippingAddress): void
    {
        $this->entityManager->persist($shippingAddress);
        $this->entityManager->flush();
    }

    public function delete(ShippingAddress $shippingAddress): void
    {
        $this->entityManager->remove($shippingAddress);
        $this->entityManager->flush();
    }
}