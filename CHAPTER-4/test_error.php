<?php
require_once '../CHAPTER-3/db_connect.php';

try {
    $sql = "SELECT * FROM ghost_table";
    $stmt = $conn->query($sql);

} catch (PDOException $e) {
    file_put_contents('7x_blog_errors.log', $e->getMessage(), FILE_APPEND);

    echo "
        <div style='background-color: #0b0e14; font-family: sans-serif; padding: 20px; border-radius: 8px; border-left: 5px solid #4B0082; margin: 20px; width: fit-content;'>
            <h3 style='color: #4B0082; margin-top: 0;'>7X Blog Notice</h3>
            <p style='color: #00D4FF; margin-bottom: 0;'>An unexpected connection issue occurred. Our tech team has logged the error.</p>
        </div>
    ";
}

?>





