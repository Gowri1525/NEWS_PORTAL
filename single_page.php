

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
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'te,en,hi',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

function setCookie(name, value, days) {
  const d = new Date();
  d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
  const expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
  const cname = name + "=";
  const decodedCookie = decodeURIComponent(document.cookie);
  const ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1);
    if (c.indexOf(cname) === 0) return c.substring(cname.length, c.length);
  }
  return "";
}

function setGoogleTranslateLanguage() {
  const lang = getCookie("googtrans");
  if (lang) {
    const iframe = document.querySelector("iframe.goog-te-banner-frame");
    if (iframe) {
      iframe.contentWindow.location.href = `https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit&sl=auto&tl=${lang}`;
    }
  }
}

document.addEventListener("DOMContentLoaded", setGoogleTranslateLanguage);
</script>

  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="subscription.php">Subscribe</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">NEWS PORTAL</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
           
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

       
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Exicted News
          </h3>


          <?php

       include('db/connection.php');
       $id=$_GET['single'];
          
           
           
        $query=mysqli_query($conn,"select * from news where id='$id'  ");
         while($row=mysqli_fetch_array($query)){
            $title=$row['title'];
            $date=$row['date'];
            $admin=$row['admin'];
            $thumbnail=$row['thumbnail'];
            $description=$row['description'];
         }
          ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $title; ?></h2>
            <p class="blog-post-meta"><?php echo $date; ?> <a href="#"><?php echo $admin;?></a></p>

            <p><img class="img img-thumbnail" style="height: 10%;" src="images/<?php echo $thumbnail;?>"  > </p>
            <hr>
            
            <blockquote>
              <?php echo $description ;?>
              
            </blockquote>
            
              
            </ol>
           
          </div><!-- /.blog-post -->
  
        
        </div><!-- /.blog-main -->

        
         
          <div class="p-3">
            <h4 class="font-italic">Follow Us</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

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
