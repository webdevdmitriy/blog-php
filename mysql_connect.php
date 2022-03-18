<?
$user = 'root';
$password = 'root';
$db = 'blog_php';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}
