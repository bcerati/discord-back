<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;

#[Entity]
#[Table(name: 'notifications')]
class Notification
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    protected string $id;

    #[ManyToOne(targetEntity: Channel::class)]
    protected Channel $channel;

    #[ManyToOne(targetEntity: User::class)]
    protected User $user;

    #[Column(type: 'datetime_immutable')]
    protected DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->setCreatedAt(new DateTimeImmutable());
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Notification
    {
        $this->id = $id;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): Notification
    {
        $this->channel = $channel;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Notification
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): Notification
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}