<?php

$host = '127.0.0.1';
$db   = 'todo_php';
if($_ENV['TODO_PROD_ENV']) {
    $user = 'root';
    $pass = 'JljvnRbJqYlWBHsCcefZcZRQfYWTjdLOphkdD6t0zOJNFwfDcT1ooZ1E3twT99KKxuIf6F';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
} else {
    $dsn = "sqlite::memory:";
}
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
