<?php

namespace App\Api\Servers;

use App\Entity\Server;
use App\Service\ServerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class Persist extends AbstractController
{
    #[Route(path: '/server/{serverId}', name: 'servers_persist', methods: ['POST', 'PUT', 'PATCH'])]
    public function __invoke(
        ServerService $serverService,
        SerializerInterface $serializer,
        Request $request,
        string $serverId = null
    ): JsonResponse {
        $data = $request->request->all();

        /** @var Server $server */
        $server = $serializer->deserialize(json_encode($data), Server::class, 'json');
        $server = $serverService->persist($server);
        
        return $this->json($server);
    }
}
