<?php

namespace App\Tests;

use App\Domain\Client\Entity\Client;
use App\Domain\Client\ValueObject\ClientId;
use App\Domain\Client\ValueObject\ClientName;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class UnitTest extends WebTestCase
{
    /** @var  EntityManagerInterface $entityManager */
    protected $entityManager;

    protected function setUp(): void
    {
        self::bootKernel(['environment' => 'test']);
        $this->entityManager = $this::$container->get('doctrine.orm.entity_manager');
//        $this->loadFixtures();
    }

    public function loadFixtures(): void
    {
        $loader = new Loader();
        $loader->loadFromDirectory(__DIR__ . '/../src/Infrastructure/Persistence/Doctrine/Fixtures/LoadClientData.php');
        $purger = new ORMPurger($this->entityManager);
        $executor = new ORMExecutor($this->entityManager, $purger);
        $executor->execute($loader->getFixtures());
    }

    public function createFakeClient(): Client
    {
        $faker = Factory::create();

        $clientEntity = new Client(ClientId::next(), new ClientName($faker->firstName, $faker->lastName));

        $this->entityManager->persist($clientEntity);
        $this->entityManager->flush();

        return $clientEntity;
    }
}
