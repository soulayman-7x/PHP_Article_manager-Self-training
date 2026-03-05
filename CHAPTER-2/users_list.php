<?php
// 1. Add contact file 
require_once 'db_connect.php';

try {
    // Define the Query
    $sql = "SELECT * FROM users";

    // Execute the Query
    $stmt = $conn->query($sql);

    // Fetch results
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article manager</title>
    <style>
        body {
            background-color: #0d0221;
            color: #00C6FF;
            font-family: 'Segoe UI', sans-serif;
        }

        h1 {
            color: #6A0DAD;
            border-bottom: 2px solid #6A0DAD;
            display: inline-block;
        }

        table {
            width: 100%;
            margin-top: 20px;
            background: rgba(106, 13, 173, 0.05);
        }

        th {
            background-color: #6A0DAD;
            color: #fff;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #240046;
        }


    </style>
</head>
<body>
    <h1>7X BLOG \\ System Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['role'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No users found in the database.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
