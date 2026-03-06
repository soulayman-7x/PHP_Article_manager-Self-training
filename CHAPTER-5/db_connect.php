<?php 
$host = 'localhost';
$db = '7x_blog';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    file_put_contents('errors.log', $e->getMessage(), FILE_APPEND);
    echo "<h1>Connection Filed</h1>";
}