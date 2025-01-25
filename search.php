
<?php 
  // Connect to the database
include('db/connection.php');

// Check if a search request was made
if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    // Sanitize the input to prevent SQL injection
    $search = mysqli_real_escape_string($conn, $search);

    // SQL query to search for articles based on category or title
    $query = mysqli_query($conn, "SELECT * FROM news WHERE category LIKE '%$search%' OR title LIKE '%$search%'");

    if (mysqli_num_rows($query) > 0) {
        echo "<div class='container'><h2>Search Results for \"" . htmlspecialchars($search) . "\"</h2><hr>";
        while ($row = mysqli_fetch_array($query)) {
            $title = $row['title'];
            $date = $row['date'];
            $admin = $row['admin'];
            $thumbnail = $row['thumbnail'];
            $description = $row['description'];
            ?>

            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $title; ?></h2>
                <p class="blog-post-meta"><?php echo $date; ?> <a href="#"><?php echo $admin; ?></a></p>
                <p><img class="img img-thumbnail" src="images/<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" style="height: 200px;"></p>
                <p><?php echo substr($description, 0, 150) . "..."; ?></p>
                <a href="single_page.php?single=<?php echo $row['id']; ?>">Continue reading</a>
                <hr>
            </div>

            <?php
        }
        echo "</div>";
    } else {
        echo "<div class='container'><h2>No results found for \"" . htmlspecialchars($search) . "\"</h2></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="style/blog.css">
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
    </div>
</body>
</html>