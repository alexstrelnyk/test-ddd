<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->regexpList = [
            0 => '{^(?'
                    .'|/api/(?'
                        .'|clients/([^/]++)(*:31)'
                        .'|([^/]++)/shipping\\-address(?'
                            .'|(*:67)'
                            .'|/([^/]++)(*:83)'
                        .')'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            31 => [[['_route' => 'api_clients_single_by_uuid', '_controller' => 'App\\Infrastructure\\Delivery\\Api\\ClientController::client'], ['uuid'], ['GET' => 0], null, false, true, null]],
            67 => [[['_route' => 'api_shipping_address_add', '_controller' => 'App\\Infrastructure\\Delivery\\Api\\ShippingAddressController::add'], ['clientUuid'], ['POST' => 0], null, false, false, null]],
            83 => [[['_route' => 'api_shipping_address_update', '_controller' => 'App\\Infrastructure\\Delivery\\Api\\ShippingAddressController::update'], ['clientUuid', 'addressUuid'], ['PUT' => 0], null, false, true, null]],
        ];
    }
}
