<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[Entity]
#[Table(name: 'documents')]
class Document
{
    #[Id]
    #[GeneratedValue(strategy: 'NONE')]
    #[Column(type: UuidType::NAME, unique: true)]
    protected string $id;

    #[Column(type: 'string', length: 30)]
    protected string $name;

    #[Column(type: 'string', length: 10)]
    protected string $extension;

    #[Column(type: 'datetime_immutable')]
    protected DateTimeImmutable $createdAt;

    /**
     * This property stores the base64 encoded document before saving it on the PrePersist even
     */
    protected string $base64;

    public function __construct()
    {
        $this->setId(Uuid::v4());
        $this->setCreatedAt(new DateTimeImmutable());
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Document
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Document
    {
        $this->name = $name;

        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): Document
    {
        $this->extension = $extension;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): Document
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getBase64(): string
    {
        return $this->base64;
    }

    public function setBase64(string $base64): Document
    {
        $this->base64 = $base64;

        return $this;
    }
}