<?php

namespace App\Api\Servers;

use App\Exception\EntityNotFoundException;
use App\Service\ServerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FetchCategories extends AbstractController
{
    /** @throws EntityNotFoundException */
    #[Route(path: '/servers/{serverId}/categories', name: 'server_fetch_categories', methods: ['GET'])]
    public function __invoke(
        ServerService $serverService,
        string $serverId,
    ): JsonResponse {
        $server = $serverService->fetchOneById($serverId);

        return $this->json($serverService->fetchCategories($server), 200, [], ['groups' => 'server:category']);
    }
}
