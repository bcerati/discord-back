<?php

namespace App\Repository\Channel;

use App\Entity\Channel;
use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

class ChannelRepository extends ServiceEntityRepository implements ChannelGatewayInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Channel::class);
    }

    public function findAllMessages(string $channelId): array
    {
        $qb = $this->_em->createQueryBuilder()
            ->from(Message::class, 'm')
            ->addSelect('m')
            ->where('m.channel = :channelId')
            ->setParameter('channelId', $channelId)
            ->orderBy('m.createdAt', 'ASC');

        return $qb->getQuery()->getResult();
    }

    /** @throws NonUniqueResultException */
    public function fetchOneById(string $channelId): ?Channel
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.server', 's')
            ->addSelect('s')
            ->where('c.id = :channelId')
            ->setParameter('channelId', $channelId);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
