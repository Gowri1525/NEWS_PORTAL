

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>NEWS PORTAL</title>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="style/blog.css" rel="stylesheet">
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

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          
            <div class="col-4 pt-1">
             <a class="text-muted" href="#"> <div id="google_translate_element" onchange="setCookie('googtrans', this.value, 30);"></div></a>

            
          </div>
          <div class="col-4 text-center">
             <a href="#">
    <img src="images/Logo new.jpg" alt="Logo" style="height: 70px; width: auto; margin-right:0px; margin-bottom: 15px;">
  </a>
            <a class="blog-header-logo text-dark" href="#">NEWS PORTAL</a>
          </div>
          <div class="col-md-4 d-flex justify-content-end align-items-center flex-column">
            <form action="search.php" method="post" class="d-flex w-100 mb-2">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
                <div class="input-group-append">
                  <button class="btn btn-success" name="submit" type="submit">Go</button>
                </div>
              </div>
            </form>
            <a class="text-muted" href="subscription.php">Subscribe</a>

            <?php if (isset($_SESSION['username'])): ?>
              <div class="d-flex align-items-center">
                <span class="mr-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="userlogout.php" class="btn btn-danger btn-sm">Logout</a>
              </div>
            <?php endif; ?>
          </div>
        </div>      
      </header>

      <div class="nav-scroller py-1 mb-2">
        <link rel="stylesheet" href="style/index.css">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Technology">Technology</a>
          <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Sports">Sports</a>
           <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Business">Business</a>
          <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Politics">Politics</a>
          <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Education">Education</a>
           <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Entertainment">Entertainment</a>
          <a class="p-2 text-muted" href="http://localhost:8080/news/category_page.php?single=Weather">Weather</a>
          <a class="p-2 text-muted" href="contect.php">Contact Us</a>
          
        </nav>
      </div>

    
           <div class="row mb-2">
  <?php
    include('db/connection.php');
     $query1 =mysqli_query($conn,"select * from news order by id desc limit 1,2 ");
      while($row=mysqli_fetch_array($query1)){
         $category=$row['category'];
         $date=$row['date'];
         $title=$row['title'];
         $thumbnail=$row['thumbnail'];

      
         }
    ?>

       

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Contact Us
          </h3>


          <div class="blog-post">
     <form action="contect.php" method="post" class="needs-validation" novalidate>
      <div class="form-group">

    <label for="uname">Enter Your Name:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter Your Name" name="name" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="email" class="form-control" id="pwd" placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
 <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
</div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php
 include('db/connection.php');

 if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $comment=$_POST['comment'];

  $query=mysqli_query($conn,"insert into comment(name,email,comment)values('$name','$email','$comment') ");
  if ($query) {
    echo "<script>alert('your comment has been send ')";
    
  }else{
    echo "Please try again";

  
  }
 }



?>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


           
         

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
