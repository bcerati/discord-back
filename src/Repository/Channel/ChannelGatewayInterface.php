<?php

namespace App\Repository\Channel;

use App\Entity\Message;

interface ChannelGatewayInterface
{
    /** @return Message[] */
    public function findAllMessages(string $channelId): array;
}
