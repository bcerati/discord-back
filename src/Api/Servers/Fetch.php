<?php

namespace App\Api\Servers;

use App\Service\ServerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class Fetch extends AbstractController
{
    #[Route(path: '/servers', name: 'servers_fetch', methods: ['GET'])]
    public function __invoke(
        ServerService $serverService,
    ): JsonResponse {
        return $this->json($serverService->fetchAll());
    }
}
