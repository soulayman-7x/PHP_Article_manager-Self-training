<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$email) {
        die('Invalid Email!');
    }

    try {
        $sql = "INSERT INTO users (username, email) VALUES (:username, :email)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'username' => $name,
            'email' => $email
        ]);

        echo "User added successfully.";
    } catch (PDOException $e) {
        file_put_contents('errors.log', $e->getMessage(), FILE_APPEND);
        echo "A system error occurred. Please contact the admin.";
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Registration</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class=" bg-[#0d0221] text-white h-screen flex items-center justify-center font-sans antialiased">
    <div class="bg-white/5 backdrop-blur-md border border-[#6a0dad]/50 p-8 rounded-2xl shadow-[0_0_20px_rgba(106,13,173,0.3)] w-full max-w-md">
        <h2 class="text-3xl font-bold mb-8 text-center text-[#00d4ff] tracking-widest border-b border-[#6a0dad]/30 pb-4">
            7X SYSTEM ACCESS
        </h2>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-[#00d4ff] mb-2 uppercase tracking-wide">User Name</label>
                <input type="text" name="name" required
                    class="w-full bg-black/40 border border-[#6a0dad] rounded-lg px-4 py-3 text-white placeholder-gray-500"
                    placeholder="Enter your name...">
            </div>

            <div>
                <label class="block text-sm font-medium text-[#00D4FF] mb-2 uppercase tracking-wide">Email Address</label>
                <input type="email" name="email"
                    class="w-full bg-black/40 border border-[#6A0DAD] rounded-lg px-4 py-3 text-white placeholder-gray-500"
                    placeholder="neo@7x.com" required >
            </div>

            <button type="submit" class="w-full bg-[#6a0dad] hover:bg-[#00d4ff] hover:text-[#0d0221] text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 shadow-[0_0_10px_rgba(106,13,173,0.5)]">
                INITIALIZE USER
            </button>


        </form>
    </div>

</body>

</html>