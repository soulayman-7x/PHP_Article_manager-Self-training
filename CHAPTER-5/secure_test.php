<?php
require_once 'db_connect.php';

echo "<div style='background-color: #0b0e14; color: #00C6FF; font-family: sans-serif; padding: 20px; border: 1px solid #6A0DAD;'>";
echo "<h2 style='color: #6A0DAD;'>7X Security Module - Chapter 5</h2>";


try {
    
    // ==========================================
    //  Step 1: Prepared query named parameters
    // ==========================================

    $stmt1 = $conn->prepare("INSERT INTO users (username, email, role) VALUES (:username, :email, :role)");
    $stmt1->execute([
        'username' => 'Mohamed',
        'email' => 'mohamed@7x.com',
        'role' => 'member'
    ]);

    echo "<p>Step 1: User 'Mohamed added successfully (Named Parameters).</p>";

    // ========================================
    //  Step 2: Prepared query with bindParam
    // ========================================

    $new_user = 'Imane';
    $new_email = 'imane@7x.com';
    $new_role = 'member';

    $stmt2 = $conn->prepare("INSERT INTO users (username, email, role) VALUES (:username, :email, :role)");

    $stmt2->bindParam(':username', $new_user);
    $stmt2->bindParam(':email', $new_email);
    $stmt2->bindParam(':role', $new_role);

    $stmt2->execute();
    echo "<p>Step 2: User 'Imane' added successfully (Using bindParam).</p>";
    

    // ============================
    //  Step 3: Safe SELECT Query
    // ============================

    $stmt3 = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt3->execute(['email' => 'neo@7x.com']);

    $user = $stmt3->fetch(PDO::FETCH_ASSOC); // kanjibo ri 1 row 

    echo "<p>Step 3: Found User Securely, username: " . $user['username'] . "</p>";

    // =============================
    //  Step 4: Anonymous Parameters
    // =============================

    $stmt4 = $conn->prepare("SELECT * FROM users WHERE id = ?");

    $stmt4->execute([1]); // Hna trtib mohim.

    $userById = $stmt4->fetch(PDO::FETCH_ASSOC);

    echo "<p>Step 4: Found user by ID (1) using Anonymous Parameters (?). Username: " . $userById['username']. "</p>";




} catch (PDOException $e) {
    echo "<p style='color:#ff00ff;'>Database Error: " . $e->getMessage() . "</p>" . $e->getMessage();
}