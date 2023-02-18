<?php

namespace App\Repository\Server;

use App\Entity\Server;

interface ServerGatewayInterface
{
    /** @return Server[] */
    public function findAll(): array;

    public function persist(Server $server): Server;

    public function fetchOneById(string $serverId): ?Server;

    public function fetchCategories(Server $server): array;
}
