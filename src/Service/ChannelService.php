<?php

namespace App\Service;

use App\Entity\Channel;
use App\Exception\EntityNotFoundException;
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

    /**
     * @throws EntityNotFoundException
     */
    public function fetchOneById(string $channelId): Channel
    {
        $channel = $this->channelGateway->fetchOneById($channelId);

        if (null === $channel) {
            throw new EntityNotFoundException('Channel not found');
        }

        return $channel;
    }
}
