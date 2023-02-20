<?php

namespace App\Repository\Server;

use App\Entity\Server;
use App\Entity\ServerCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

class ServerRepository extends ServiceEntityRepository implements ServerGatewayInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Server::class);
    }

    public function findAll(): array
    {
        $qb = $this->createQueryBuilder('s')
            ->leftJoin('s.image', 'i')
            ->addSelect('i')
            ->orderBy('s.createdAt', 'ASC');

        return $qb->getQuery()->getResult();
    }

    /** @throws NonUniqueResultException */
    public function fetchOneById(string $serverId): ?Server
    {
        $qb = $this->createQueryBuilder('s')
            ->leftJoin('s.image', 'i')
            ->addSelect('i')
            ->where('s.id = :serverId')
            ->setParameter('serverId', $serverId);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function fetchCategories(Server $server): array
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('sc')
            ->from(ServerCategory::class, 'sc')
            ->where('sc.server = :serverId')
            ->setParameter('serverId', $server->getId());

        return $qb->getQuery()->getResult();
    }

    public function persist(Server $server): Server
    {
        $this->_em->persist($server);
        $this->_em->flush();

        return $server;
    }
}
