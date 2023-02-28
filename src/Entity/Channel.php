<?php

namespace App\Entity;

use App\Repository\Channel\ChannelRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;

#[Entity(repositoryClass: ChannelRepository::class)]
#[Table(name: 'channels')]
class Channel
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    #[Groups(['server:category', 'channel'])]
    protected string $id;

    #[Column(type: 'string', length: 30)]
    #[Groups(['server:category', 'channel'])]
    protected string $name;

    #[Column(type: 'datetime_immutable')]
    #[Groups(['server:category', 'channel'])]
    protected DateTimeImmutable $createdAt;

    #[ManyToOne(targetEntity: Server::class)]
    protected Server $server;

    #[ManyToOne(targetEntity: ServerCategory::class, inversedBy: 'channels')]
    protected ?ServerCategory $category = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Channel
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Channel
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): Channel
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function setServer(Server $server): Channel
    {
        $this->server = $server;

        return $this;
    }

    public function getCategory(): ?ServerCategory
    {
        return $this->category;
    }

    public function setCategory(?ServerCategory $category): Channel
    {
        $this->category = $category;

        return $this;
    }
}