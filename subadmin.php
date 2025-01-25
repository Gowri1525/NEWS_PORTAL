<?php
 session_start();
?>

<!DOCTYPE html>
 <html>
 <head>
  <title> Sub-Admin login</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!--costom css--->
<link rel="stylesheet" href="style/admin.css">
 </head>
 <body>
  <div class="container">
    <form action="subadmin.php" method="post">
      <h3>Sub-Admin Login</h3>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd">
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary" value="login">login</button>
</form>
  </div>
 </body>
 </html>
 <?php
   include('db/connection.php');

   if (isset($_POST['submit'])) {
     $email=$_POST['email'];
    $password=$_POST['password'];
     $query=mysqli_query($conn,"Select * from subadmin where email='$email' AND password='$password' ");

     if ($query) {
      if (mysqli_num_rows($query)>0) {
        $_SESSION['email']=$email;

          header('location:home.php');
      }else{
        echo "<script> alert('Invalid Credentials,Please Try Again')</script>";
      }
     }

   }
?>