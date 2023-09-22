<?php
declare(strict_types=1);

namespace App\Infrastructure\Delivery;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $response = new JsonResponse(
            [
                'success' => false,
                'message' => $exception->getMessage()
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );

        $event->setResponse($response);
    }
}
