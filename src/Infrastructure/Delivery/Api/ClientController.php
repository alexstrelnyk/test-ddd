<?php
declare(strict_types=1);

namespace App\Infrastructure\Delivery\Api;

use App\Application\ClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/clients", name="api_clients_")
 */
class ClientController
{
    /**
     * @Route("/{uuid}", name="single_by_uuid", methods={"GET"})
     */
    public function client ( Request $request, ClientInterface $client ): JsonResponse
    {
        return new JsonResponse([
             'success' => true,
             'client' => $client->clientById($request->get('uuid'))
        ]);
    }
}