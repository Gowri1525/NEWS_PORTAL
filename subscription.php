<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert data into the subscriptions table
    $sql = "INSERT INTO subscriptions (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        $message = "You have successfully subscribed to our newsportal...!";
    } else {
        // Enhanced error message for debugging
        $message = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe to News Portal</title>
    <link rel="stylesheet" href="style/Subscription.css"> <!-- Optional: Link to external CSS file -->
    <div>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'te,en,hi',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

</script>
</div>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<body>
     <div class="col-4 pt-1">
             <a class="text-muted" href="#"> <div id="google_translate_element" onchange="setCookie('googtrans', this.value, 30);"></div></a>
     </div>

    <div class="subscription-form">
        <h2>Subscribe to Our News Portal</h2>

        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

        <form method="POST" action="subscription.php">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Subscribe</button>
        </form>
    </div>

</body>
</html>
