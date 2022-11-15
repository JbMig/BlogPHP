<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $pseudo;
    private string $password;
    private string $email;
    private array $admin = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     * @return User
     */
    public function setPseudo(string $pseudo): User
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAdmin(): bool
    {
        $admin = $this->admin;
        return $admin;
    }

    /**
     * @param bool $admin
     * @return User
     */
    public function setAdmin(bool $admin): User
    {
        $this->admin = $admin;
        return $this;
    }

    public function getHashedPassword(): string
    {
        // TODO: Implement getHashedPassword() method.
    }

    public function passwordMatch(): bool
    {
        // TODO: Implement passwordMatch() method.
    }
}
