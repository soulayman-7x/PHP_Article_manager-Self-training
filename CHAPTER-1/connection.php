<?php
// 1- Connection Parameters
$host = 'localhost';
$dbname = '7x_blog';
$username = 'root';
$password = 'IDSS010110';

try {
    // 2- Create a DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    // 3- Create a new PDO Instance
    $pdo = new PDO($dsn, $username, $password);

    // 4- Set Error Mode Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE => (ERROR MODE)
    echo "Connection Successful to database: $dbname";
} catch (PDOException $e) {
    // 5- Catch and handle connection errors
    die("Connection Failed: " . $e->getMessage()); // dert "die" 7it hiya katwa9af lbarnamaj 
}

?>

