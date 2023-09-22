<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'doctrine.fixtures.loader' shared service.

include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/Loader.php';
include_once $this->targetDirs[3].'/vendor/symfony/doctrine-bridge/DataFixtures/ContainerAwareLoader.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-fixtures-bundle/Loader/SymfonyFixturesLoader.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/FixtureInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/SharedFixtureInterface.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/AbstractFixture.php';
include_once $this->targetDirs[3].'/vendor/doctrine/data-fixtures/lib/Doctrine/Common/DataFixtures/OrderedFixtureInterface.php';
include_once $this->targetDirs[3].'/src/Infrastructure/Persistence/Doctrine/Fixtures/LoadClientData.php';

$this->privates['doctrine.fixtures.loader'] = $instance = new \Doctrine\Bundle\FixturesBundle\Loader\SymfonyFixturesLoader($this);

$instance->addFixtures([0 => ['fixture' => ($this->privates['App\\Infrastructure\\Persistence\\Doctrine\\Fixtures\\LoadClientData'] ?? ($this->privates['App\\Infrastructure\\Persistence\\Doctrine\\Fixtures\\LoadClientData'] = new \App\Infrastructure\Persistence\Doctrine\Fixtures\LoadClientData())), 'groups' => []]]);

return $instance;
