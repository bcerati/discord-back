<?php

namespace App\Service;

use App\Entity\Server;
use App\Exception\EntityNotFoundException;
use App\Repository\Server\ServerGatewayInterface;

class ServerService
{
    public function __construct(
        protected ServerGatewayInterface $serverGateway
    ) {
    }

    public function fetchAll(): array
    {
        return $this->serverGateway->findAll();
    }

    public function persist(Server $server): Server
    {
        return $this->serverGateway->persist($server);
    }

    /** @throws EntityNotFoundException */
    public function fetchOneById(string $serverId): Server
    {
        $server = $this->serverGateway->fetchOneById($serverId);

        if (!$server instanceof Server) {
            throw new EntityNotFoundException(sprintf('Server with id %s not found', $serverId));
        }

        return $server;
    }

    public function fetchCategories(Server $server): array
    {
        return $this->serverGateway->fetchCategories($server);
    }
}
