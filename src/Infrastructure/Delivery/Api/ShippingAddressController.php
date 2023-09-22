<?php
declare(strict_types=1);

namespace App\Infrastructure\Delivery\Api;

use App\Application\ShippingAddressInterface;
use App\Domain\Client\ValueObject\ClientId;
use App\Domain\ShippingAddress\ValueObject\ShippingAddressId;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/{clientUuid}/shipping-address", name="api_shipping_address_")
 */
class ShippingAddressController
{
    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request, ShippingAddressInterface $manager)
    {
        $clientUuid = ClientId::fromString($request->get('clientUuid'));
        $manager->add($clientUuid, $request->request->all());

        return new JsonResponse([
            "success" => true
        ]);
    }

    /**
     * @Route("/{addressUuid}", name="update", methods={"PUT"})
     */
    public function update(Request $request, ShippingAddressInterface $manager)
    {
        $addressUuid = ShippingAddressId::fromString($request->get('addressUuid'));
        $manager->update($addressUuid, $request->request->all());

        return new JsonResponse([
            "success" => true
        ]);
    }

    /**
     * @Route("/{addressUuid}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, ShippingAddressInterface $manager)
    {
        $addressUuid = ShippingAddressId::fromString($request->get('addressUuid'));
        $manager->delete($addressUuid, $request->request->all());

        return new JsonResponse([
            "success" => true
        ]);
    }

}