<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'test.client' service.

include_once $this->targetDirs[3].'/vendor/symfony/browser-kit/Client.php';
include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Client.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Client.php';
include_once $this->targetDirs[3].'/vendor/symfony/browser-kit/History.php';
include_once $this->targetDirs[3].'/vendor/symfony/browser-kit/CookieJar.php';

$this->factories['test.client'] = function () {
    return new \Symfony\Bundle\FrameworkBundle\Client(($this->services['kernel'] ?? $this->get('kernel', 1)), [], (new \Symfony\Component\BrowserKit\History()), (new \Symfony\Component\BrowserKit\CookieJar()));
};

return $this->factories['test.client']();
