<?php

namespace App\Api\Channels;

use App\Service\ChannelService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FetchMessages extends AbstractController
{
    #[Route(path: '/servers/{serverId}/{channelId}/messages', name: 'channels_fetch_messages', methods: ['GET'])]
    public function __invoke(
        ChannelService $channelService,
        string $channelId,
    ): JsonResponse {
        //TODO: check that channelIs is really in the server serverId!

        return $this->json(
            data: $channelService->fetchAllMessages($channelId),
            context: ['groups' => ['channel_messages']]
        );
    }
}
