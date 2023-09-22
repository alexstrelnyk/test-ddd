<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Fixtures;

use App\Domain\Client\Entity\Client;
use App\Domain\Client\ValueObject\ClientId;
use App\Domain\Client\ValueObject\ClientName;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $client = new Client(
            ClientId::next(),
            new ClientName($faker->firstName, $faker->lastName)
        );

        $manager->persist($client);
        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}
