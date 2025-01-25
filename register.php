<?php
include('db/connection.php'); // Connect to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>