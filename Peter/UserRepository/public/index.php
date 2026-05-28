<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Repositories\UserRepository;
$pdo = new PDO('mysql:host=localhost;dbname=user_repo_opdracht', 'root', '');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$userRepository = new UserRepository($pdo)
;
