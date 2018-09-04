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
                            <li><a href="/index.php?page=0">Home</a></li>
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
            <?php
                $per_page = 3;
                $active = 0;
                if (isset($_GET['page'])) {
                    $page=($_GET['page']); 
                }
                else {
                    $page=0;
                }
                $start=abs($page*$per_page);

                $articles = mysqli_query($connection, "SELECT * FROM `posts` ORDER BY `id` LIMIT $start, $per_page"); 
                while ($post = mysqli_fetch_assoc($articles)) {
            ?>
                <div class="article">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="photo">
                                <img src="images/pic<?php echo $post['id'];?>.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">
                                <h2><?php echo $post['title']; ?></h2>
                                <div class="subtitle">
                                    <?php echo $post['description']; ?>
                                </div>
                                <div class="showmore">
                                    <a href="/article.php?id=<?php echo $post['id'];?>">Continue Reading</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            ?> 
            </div>
            <div class="pagination">
            <?php

            ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="prev_page">
                            <a href="index.php?page=" class="previous">previous page</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pages">
                            <ul>
                                <li><a href="index.php?page=">1</a></li>
                                <li><a href="index.php?page=">2</a></li>
                                <li><a href="index.php?page=">3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="next_page">
                            <a href="index.php?page=1" class="next">next page</a>
                        </div>
                    </div>
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