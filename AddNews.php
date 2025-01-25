<?php
session_start();
if ($_SESSION['email'] == true) {
    # code...
} else {
    header('location:admin_login.php');
}
$page = 'product';
include('include/header.php');
?>

<div style="margin-left:17%;  width: 80%;">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="news.php">News</a></li>
        <li class="breadcrumb-item active">Add News</li>
    </ul>
</div>

<div style="width: 70%; margin-left: 25%;">
    <form action="addnews.php" method="post" enctype="multipart/form-data" name="categoryform" onsubmit="return validateform()">
        <h1>Add News</h1>
        <hr>
        <div class="form-group">
            <label for="email">Title:</label>
            <input type="text" placeholder="Title..." name="title" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" placeholder="Description..." rows="5" name="description" id="comment"></textarea>
        </div>
        <div class="form-group">
            <label for="youtube_link">YouTube Video Link:</label>
            <input type="url" placeholder="https://www.youtube.com/watch?v=example" name="youtube_link" class="form-control" id="youtube_link">
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" class="form-control img-thumbnail" id="thumbnail">
        </div>

        

        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category">
                <?php
                include('db/connection.php');
                $query = mysqli_query($conn, "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="admin">Admin</label>
            <input type="text" class="form-control" disabled value="<?php echo $_SESSION['email']; ?>">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>

    <script>
        function validateform() {
            var x = document.forms['categoryform']['title'].value;
            var y = document.forms['categoryform']['description'].value;
            var z = document.forms['categoryform']['date'].value;
            var w = document.forms['categoryform']['category'].value;
            if (x == "") {
                alert('Title must be filled out!');
                return false;
            }
            if (y == "") {
                alert('Description must be filled out!');
                return false;
            }
            if (y.length < 10) {
                alert('Description must be at least 100 characters!');
                return false;
            }
            return true;
        }
    </script>
</div>

<?php
include('include/footer.php');
?>

<?php
include('db/connection.php');

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $admin = mysqli_real_escape_string($conn, $_SESSION['email']);

    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];

    // Move uploaded file to the images folder
    move_uploaded_file($tmp_thumbnail, "images/$thumbnail");

    // Insert data into the database
    $query1 = mysqli_query(
        $conn,
        "INSERT INTO news (title, description, date, category, thumbnail, admin) 
        VALUES ('$title', '$description', '$date', '$category', '$thumbnail', '$admin')"
    );

    if ($query1) {
        echo "<script> alert('News uploaded Successfully!'); </script>";
    } else {
        echo "<script> alert('Please Try Again!'); </script>";
    }
}

?>