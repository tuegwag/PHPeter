<?php
declare (strict_types=1);

namespace App\Repositories;

use App\Domain\User;
use PDO;

class UserRepositories
{

}

public function __construct(private readonly PDO $pdo){}

public function findByUsername(string $username):?array
