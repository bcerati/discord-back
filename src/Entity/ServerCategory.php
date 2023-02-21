<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Annotation\Groups;

#[Entity()]
#[Table(name: 'server_categories')]
class ServerCategory
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    #[Groups(['server:category'])]
    protected string $id;

    #[Column(type: 'string', length: 30)]
    #[Groups(['server:category'])]
    protected string $name;

    #[Column(type: 'datetime_immutable')]
    #[Groups(['server:category'])]
    protected DateTimeImmutable $createdAt;

    #[ManyToOne(targetEntity: Server::class)]
    protected Server $server;

    #[OneToMany(mappedBy: 'category', targetEntity: Channel::class)]
    #[Groups(['server:category'])]
    protected Collection $channels;

    public function __construct()
    {
        $this->setCreatedAt(new DateTimeImmutable());
        $this->setChannels(new ArrayCollection());
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ServerCategory
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ServerCategory
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): ServerCategory
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function setServer(Server $server): ServerCategory
    {
        $this->server = $server;

        return $this;
    }

    public function getChannels(): Collection
    {
        return $this->channels;
    }

    public function setChannels(Collection $channels): ServerCategory
    {
        $this->channels = $channels;

        return $this;
    }
}