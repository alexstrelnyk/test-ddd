<?php

namespace App\Tests\ShippingAddress;

use App\Application\Dto\ShippingAddressDto;
use App\Application\ShippingAddressInterface;
use App\Domain\ShippingAddress\Entity\ShippingAddress;
use App\Domain\Client\ValueObject\ClientId;
use App\Domain\ShippingAddress\Exception\ShippingAddressException;
use App\Domain\ShippingAddress\Repository\ShippingAddressRepositoryInterface;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;
use App\Tests\UnitTest;
use Faker\Factory;

class ShippingAddressTest extends UnitTest
{
    public function testCreateShippingAddress()
    {
        /** @var ShippingAddressInterface $shippingAddress */
        $shippingAddress = $this::$container->get(ShippingAddressInterface::class);

        $client = $this->createFakeClient();

        $fakeData = $this->getFakeShippingAddressData();

        $id = $shippingAddress->add($client->uuid(), $fakeData);
        $shippingAddressEntity = $this::$container->get(ShippingAddressRepositoryInterface::class)
            ->get(ShippingAddressId::fromString($id));

        $this->assertInstanceOf(ShippingAddress::class, $shippingAddressEntity);
        $this->assertEquals($fakeData['country'], $shippingAddressEntity->country());
        $this->assertEquals($fakeData['city'], $shippingAddressEntity->city());
        $this->assertEquals($fakeData['zipCode'], $shippingAddressEntity->zipCode());
        $this->assertEquals($fakeData['street'], $shippingAddressEntity->street());
    }

    public function testCreateShippingAddressLimit()
    {
        /** @var ShippingAddressInterface $shippingAddress */
        $shippingAddress = $this::$container->get(ShippingAddressInterface::class);

        $client = $this->createFakeClient();

        $fakeData = $this->getFakeShippingAddressData();
        $this->expectException(ShippingAddressException::class);

        for ($i = 1; $i <= $shippingAddress->getMaxLimit() + 1; $i++) {
            $shippingAddress->add($client->uuid(), $fakeData);
        }
    }

    public function testUpdateShippingAddress()
    {
        /** @var ShippingAddressInterface $shippingAddress */
        $shippingAddress = $this::$container->get(ShippingAddressInterface::class);

        $client = $this->createFakeClient();

        $shippingAddressEntity = $this->createFakeShippingAddress();

        $fakeData = $this->getFakeShippingAddressData();
        $fakeData['isDefault'] = (bool) random_int(0,1);

        $shippingAddress->update($shippingAddressEntity->uuid(), $fakeData);
        $this->entityManager->refresh($shippingAddressEntity);

        $this->assertInstanceOf(ShippingAddress::class, $shippingAddressEntity);
        $this->assertEquals($fakeData['country'], $shippingAddressEntity->country());
        $this->assertEquals($fakeData['city'], $shippingAddressEntity->city());
        $this->assertEquals($fakeData['zipCode'], $shippingAddressEntity->zipCode());
        $this->assertEquals($fakeData['street'], $shippingAddressEntity->street());
    }

    public function testUpdateShippingAddressNotFound()
    {
        /** @var ShippingAddressInterface $shippingAddress */
        $shippingAddress = $this::$container->get(ShippingAddressInterface::class);

        $fakeData = $this->getFakeShippingAddressData();
        $fakeData['isDefault'] = (bool) random_int(0,1);

        $this->expectException(ShippingAddressException::class);

        $shippingAddress->update(ShippingAddressId::next(), $fakeData);
    }

    private function getFakeShippingAddressData(): array
    {
        $faker = Factory::create();

        return [
            'country' => $faker->country,
            'city' => $faker->city,
            'zipCode' => $faker->postcode,
            'street' => $faker->streetAddress
        ];
    }

    private function createFakeShippingAddress(): ShippingAddress
    {
        $faker = Factory::create();

        $data = $this->getFakeShippingAddressData();
        $data['isDefault'] = $faker->boolean;

        $shippingAddress = new ShippingAddress(
            ShippingAddressId::next(),
            new ShippingAddressDto($this->createFakeClient(), $data)
        );

        $this->entityManager->persist($shippingAddress);
        $this->entityManager->flush();

        return $shippingAddress;
    }
}