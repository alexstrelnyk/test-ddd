<?php
declare(strict_types=1);

namespace App\Application;

use App\Application\Assembler\ShippingAddressDtoAssembler;
use App\Domain\Client\Repository\ClientRepositoryInterface;
use App\Domain\Client\ValueObject\ClientId;
use App\Domain\Client\Entity\Client as ClientEntity;
use App\Domain\ShippingAddress\Exception\ShippingAddressException;
use App\Domain\ShippingAddress\Repository\ShippingAddressRepositoryInterface;
use App\Domain\ShippingAddress\Entity\ShippingAddress as ShippingAddressEntity;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;

class ShippingAddress implements ShippingAddressInterface
{
    private $repository;

    private $clientRepository;

    public const MAX_ADDRESSES = 3;

    public function __construct( ClientRepositoryInterface $clientRepository, ShippingAddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->clientRepository = $clientRepository;
    }

    public function add(ClientId $clientId, array $data): string
    {
        $client = $this->clientRepository->get($clientId);
        $defaultAddress = $this->repository->defaultByClient($client);
        $addressCount = $this->countOfAddress($client);

        if ($addressCount >= self::MAX_ADDRESSES) {
             throw ShippingAddressException::maxLimit();
        }

        $data['isDefault'] = ($addressCount == 0 || !$defaultAddress);
        $dto = (new ShippingAddressDtoAssembler())
           ->fromArray($client, $data);

        $id = ShippingAddressId::next();

        $this->repository->save(new ShippingAddressEntity($id, $dto));

        return (string) $id;
    }

    public function update(ShippingAddressId $addressUuid, array $data): void
    {
        if (!$address = $this->repository->get($addressUuid)) {
            throw ShippingAddressException::notFound((string) $addressUuid);
        }

        $this->repository->save($address);
    }

    public function delete(ShippingAddressId $addressUuid): void
    {
        if (!$address = $this->repository->get($addressUuid)) {
            throw ShippingAddressException::notFound((string) $addressUuid);
        }

        if ($address->isDefault()) {
            throw ShippingAddressException::defaultAddress();
        }

        $this->repository->delete($address);
    }

    public function countOfAddress(ClientEntity $client): int
    {
        return (int) $this->repository->countOfAddress($client);
    }

    public function getMaxLimit(): int
    {
        return static::MAX_ADDRESSES;
    }
}