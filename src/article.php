<?php
require "php-srcipts/config.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap-grid-sass.min.css">
  <title>Document</title>
</head>
<body>
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="blog">
          BLOG
        </div>
      </div>
      <div class="col-md-7 col-md-offset-2">
        <div class="navigation">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Work</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="articles">
      <div class="open_article">
      <?php 
      $article_id = $_GET['id'];
      $articles = mysqli_query($connection, "SELECT * FROM `posts` WHERE `id`= $article_id");
      while ($post = mysqli_fetch_assoc($articles)) {
      ?>
        <div class="row">
         <div class="col-md-12">
           <div class="article_title">
             <h2><?php echo $post['title']; ?></h2>
           </div>
         </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="article_image">
              <img src="images/pic<?php echo $post['id'];?>.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
           <div class="article_text">
             <?php echo $post['text']; ?>
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-md-offset-10">
            <div class="article_author">
                <p>Article author: <?php echo $post['author']; ?></p>
            </div>
          </div>
        </div>
        <?php 
        }
      ?>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="info">
          <h3>Blog</h3>
          <div class="social">
            social icons
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>