<?php

namespace App\Api\Channels;

use App\Service\ChannelService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FetchOne extends AbstractController
{
    #[Route(path: '/servers/{serverId}/channels/{channelId}', name: 'channel_fetch_one', methods: ['GET'])]
    public function __invoke(
        ChannelService $channelService,
        string $channelId,
    ): JsonResponse {
        //TODO: check that channelIs is really in the server serverId!

        return $this->json(
            data: $channelService->fetchOneById($channelId),
            context: ['groups' => ['channel']]
        );
    }
}
