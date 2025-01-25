<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $youtube_link = $_POST['youtube_link'];

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO videos (title, youtube_link) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $youtube_link);

    if ($stmt->execute()) {
        echo "Video added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>