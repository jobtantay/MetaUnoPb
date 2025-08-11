<?php
session_start();
require 'database.php'; // include your DB connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password_hash'])) {
            // Store session data (move this here!)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid password'); window.location.href='../pages/landing.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email'); window.location.href='../pages/landing.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>