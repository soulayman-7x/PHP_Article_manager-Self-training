<?php
require_once 'db_connect.php';

try {
/** 
    // Step 1:

    // 1. Prepare
    $sql = "INSERT INTO users (username, email, role) VALUES (:username, :email, :role)";
    $stmt = $conn->prepare($sql);

    // 2. Execute
    $stmt->execute([
        'username' => 'NEO 7X',
        'email' => 'neo@7x.com',
        'role' => 'admin'
    ]);

    echo "The user was added successfully.";
*/
/** // Step 2
    $sql = "UPDATE users SET email = :new_email WHERE id = :user_id";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        'new_email' => 'neo_update@7x.com',
        'user_id' => 4
    ]);

    echo "The user data has been updated.";
*/

// Step 3
    $sql = "DELETE FROM users WHERE id = :target_id";  
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        'target_id' => 3
    ]);

    echo "The user has been deleted from the system.";


} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}