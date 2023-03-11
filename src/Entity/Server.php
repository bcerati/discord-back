<?php

namespace App\Entity;

use App\Repository\Server\ServerRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;

#[Entity(repositoryClass: ServerRepository::class)]
#[Table(name: 'servers')]
class Server
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    protected string $id;

    #[Column(type: 'string', length: 30)]
    protected string $name;

    #[OneToOne(targetEntity: Document::class, cascade: ['persist'])]
    protected Document $image;

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

    public function setId(string $id): Server
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Server
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): Server
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImage(): Document
    {
        return $this->image;
    }

    public function setImage(Document $image): Server
    {
        $this->image = $image;

        return $this;
    }
}
