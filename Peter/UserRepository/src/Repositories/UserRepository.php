<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Domain\User;
use PDO;

class UserRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    public function findByUsername(string $username): ?User
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $statement->execute(['username' => $username]);
        $row = $statement->fetch();

        return $row === false ? null : $this->hydrate($row);
    }

    public function register(string $username, string $email, string $passwordHash): User
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)'
        );
        $statement->execute([
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash,
        ]);

        return new User(
            id: (int) $this->pdo->lastInsertId(),
            username: $username,
            email: $email,
        );
    }

    private function hydrate(array $row): User
    {
        return new User(
            id: (int) $row['id'],
            username: $row['username'],
            email: $row['email'],
        );
    }
}
