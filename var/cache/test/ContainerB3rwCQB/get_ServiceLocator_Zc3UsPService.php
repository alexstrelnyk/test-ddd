<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.zc3_usP' shared service.

return $this->privates['.service_locator.zc3_usP'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'client' => ['services', 'App\\Application\\ClientInterface', 'getClientInterfaceService.php', true],
]);
