<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;

#[Entity()]
#[Table(name: 'messages')]
class Message
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    #[Groups(['channel_messages'])]
    protected string $id;

    #[Column(type: 'text')]
    #[Groups(['channel_messages'])]
    protected string $content;

    #[Column(type: 'datetime_immutable')]
    #[Groups(['channel_messages'])]
    protected DateTimeImmutable $createdAt;

    #[Column(type: 'datetime_immutable', nullable: true)]
    #[Groups(['channel_messages'])]
    protected ?DateTimeImmutable $updatedAt = null;

    #[ManyToOne(targetEntity: Channel::class)]
    protected Channel $channel;

    #[ManyToOne(targetEntity: User::class)]
    #[JoinColumn(nullable: false)]
    #[Groups(['channel_messages'])]
    protected User $user;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Message
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Message
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): Message
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): Message
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): Message
    {
        $this->channel = $channel;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Message
    {
        $this->user = $user;

        return $this;
    }
}
