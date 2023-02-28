<?php

namespace App\Repository\Channel;

use App\Entity\Channel;
use App\Entity\Message;

interface ChannelGatewayInterface
{
    /** @return Message[] */
    public function findAllMessages(string $channelId): array;

    public function fetchOneById(string $channelId): ?Channel;
}
