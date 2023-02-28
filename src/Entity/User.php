<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[Entity]
#[Table(name: 'users')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[Id]
    #[GeneratedValue(strategy: 'CUSTOM')]
    #[Column(type: UuidType::NAME, unique: true)]
    #[CustomIdGenerator(class: UuidGenerator::class)]
    protected string $id;

    #[Column(type: 'string', unique: true)]
    protected string $email;

    #[Column(type: 'json')]
    protected array $roles = [];


    #[Column(type: 'string')]
    protected string $password;

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

    public function setId(string $id): User
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): User
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): User
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function eraseCredentials()
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }
}