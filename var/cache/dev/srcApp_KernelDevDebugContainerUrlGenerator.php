<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'api_clients_single_by_uuid' => [['uuid'], ['_controller' => 'App\\Infrastructure\\Delivery\\Api\\ClientController::client'], [], [['variable', '/', '[^/]++', 'uuid', true], ['text', '/api/clients']], [], []],
        'api_shipping_address_add' => [['clientUuid'], ['_controller' => 'App\\Infrastructure\\Delivery\\Api\\ShippingAddressController::add'], [], [['text', '/shipping-address'], ['variable', '/', '[^/]++', 'clientUuid', true], ['text', '/api']], [], []],
        'api_shipping_address_update' => [['clientUuid', 'addressUuid'], ['_controller' => 'App\\Infrastructure\\Delivery\\Api\\ShippingAddressController::update'], [], [['variable', '/', '[^/]++', 'addressUuid', true], ['text', '/shipping-address'], ['variable', '/', '[^/]++', 'clientUuid', true], ['text', '/api']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
