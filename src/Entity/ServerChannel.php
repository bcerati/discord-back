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
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;

#[Entity()]
#[Table(name: 'server_channels')]
class ServerChannel
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    protected string $id;

    #[Column(type: 'string', length: 30)]
    protected string $name;

    #[Column(type: 'datetime_immutable')]
    protected DateTimeImmutable $createdAt;

    #[ManyToOne(targetEntity: Server::class)]
    protected Server $server;

    #[ManyToOne(targetEntity: ServerCategory::class)]
    protected ?ServerCategory $category = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ServerChannel
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ServerChannel
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): ServerChannel
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function setServer(Server $server): ServerChannel
    {
        $this->server = $server;

        return $this;
    }

    public function getCategory(): ?ServerCategory
    {
        return $this->category;
    }

    public function setCategory(?ServerCategory $category): ServerChannel
    {
        $this->category = $category;

        return $this;
    }
}