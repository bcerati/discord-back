<?php

namespace App\Api\Servers;

use App\Exception\EntityNotFoundException;
use App\Service\ServerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FetchOne extends AbstractController
{
    /** @throws EntityNotFoundException */
    #[Route(path: '/servers/{serverId}', name: 'server_fetch_one', methods: ['GET'])]
    public function __invoke(
        ServerService $serverService,
        string $serverId,
    ): JsonResponse {
        return $this->json($serverService->fetchOneById($serverId));
    }
}
