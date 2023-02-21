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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
	<div class="topnav">
        <?php
        if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
            <a href="login.php"><img src="../media/img/login.png" height="25"><br>login</a>
            <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" height="65">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">

        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../media/img/bg-1.jpg" height="400" alt="Los Angeles" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="../media/img/bg-2.jpg" height="400" alt="Chicago" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="../media/img/bg-3.jpg" height="400" alt="New York" class="d-block" style="width:100%">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

    </div>
        <?php } else {
            if (isset($_GET['admin']) || $_SESSION['adminLogged']){
                echo "Admin OK";
              } else
            ?>
    <div class="topnav">
            <a href="../index.php?action=logout">logout</a>
            <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
            <a href="../index.php?action=basket"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" height="70">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">

            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../media/img/bg-1.jpg" height="400" alt="Los Angeles" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../media/img/bg-2.jpg" height="400" alt="Chicago" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../media/img/bg-3.jpg" height="400" alt="New York" class="d-block" style="width:100%">
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            </div>
        <?php } ?>
    </body>
</html>
