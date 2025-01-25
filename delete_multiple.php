<?php
include('db/connection.php');

if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $id_list = implode(',', $ids);

    $query = mysqli_query($conn, "DELETE FROM category WHERE id IN ($id_list)");

    if ($query) {
        echo "<script>alert('Selected categories deleted!');</script>";
        echo "<script>window.location='http://localhost/news/category.php';</script>";
    } else {
        echo "<script>alert('Error deleting records. Please try again.');</script>";
        echo "<script>window.location='http://localhost/news/category.php';</script>";
    }
} else {
    echo "<script>alert('No categories selected!');</script>";
    echo "<script>window.location='http://localhost/news/category.php';</script>";
}
?>
