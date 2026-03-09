<?php
$host = 'localhost';
$db = '7x_blog';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    file_put_contents('errors.log', $e->getMessage(), FILE_APPEND);
    echo "Connection filed. Please contact Support";
    die();
}