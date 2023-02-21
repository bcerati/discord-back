<?php

namespace App\Service;

use App\Repository\Channel\ChannelGatewayInterface;

class ChannelService
{
    public function __construct(
        protected ChannelGatewayInterface $channelGateway
    ) {
    }

    public function fetchAllMessages(string $channelId): array
    {
        return $this->channelGateway->findAllMessages($channelId);
    }
}
