<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
    <?php
    if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
	<div class="topnav">
            <a href="login.php"><img src="../media/img/login.png" height="25"><br>login</a>
            <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <a href="../index.php?action=home"><img src="../media/img/logo.png" id="logo" height="65"></a>
            <?php // A mettre sur la searchbar sur la page home ?>
    </div>
        <div class="slideshow-container">

            <div class="mySlides fadeSlide">
                <div class="numbertext">1 / 3</div>
                <img src="../media/img/bg-1.jpg" style="width:100%" height="225">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fadeSlide">
                <div class="numbertext">2 / 3</div>
                <img src="../media/img/bg-2.jpg" style="width:100%" height="225">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fadeSlide">
                <div class="numbertext">3 / 3</div>
                <img src="../media/img/bg-3.jpg" style="width:100%" height="225">
                <div class="text">Caption Three</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <?php
        require "../models/model.php";
        DisplayArticles();
            } else {
            ?>
    <div class="topnav">
        <a href="../index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
        <img src="../media/img/logo.png" height="65">
        <form action="/Code/index.php?action=logged" method="POST">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">
        </form>
    </div>
        <div class="slideshow-container">

            <div class="mySlides fadeSlide">
                <div class="numbertext">1 / 3</div>
                <img src="../media/img/bg-1.jpg" style="width:100%" height="225">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fadeSlide">
                <div class="numbertext">2 / 3</div>
                <img src="../media/img/bg-2.jpg" style="width:100%" height="225">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fadeSlide">
                <div class="numbertext">3 / 3</div>
                <img src="../media/img/bg-3.jpg" style="width:100%" height="225">
                <div class="text">Caption Three</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <?php
        require "../models/model.php";
        DisplayArticles();
        } ?>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            console.log("slides", slides);
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
    </body>
</html>
