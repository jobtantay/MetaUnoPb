<?php
include 'database.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password_hash, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $fname, $lname, $email, $password_hash);

    if ($stmt->execute()) {
        // After register, go back to login view
        echo "<script>alert('Registration successful!'); window.location.href='../Pages/landing.php?login';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
