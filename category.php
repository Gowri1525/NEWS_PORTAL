<?php
session_start();
if ($_SESSION['email'] == true) {
    // code
} else {
    header('location:admin_login.php');
}
$page = 'category';
include('include/header.php');
?>

<div style="width: 80%; margin-left: 25%; margin-top: 10%">
    <div class="text-right">
        <a class="btn btn-primary" href="addcaegory.php">Add Category</a>
    </div>
    <form method="post" action="delete_multiple.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select_all"> Select All</th>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db/connection.php');
                $query = mysqli_query($conn, "select * from category");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo substr($row['des'], 0, 200); ?></td>
                        <td><a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">edit</a></td>
                        <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger">Delete Selected</button>
    </form>
</div>

<script>
    // JavaScript to handle "Select All" functionality
    document.getElementById('select_all').addEventListener('click', function () {
        let checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>

<?php include('include/footer.php'); ?>
