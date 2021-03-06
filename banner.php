<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Bootstrap -->
    <?php include 'bootstrap.php' ?>

</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3500">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner/everyOne.jpg" class="d-block w-100" height="450" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banner/gemini.png" class="d-block w-100" height="450" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banner/redsun.png" class="d-block w-100" height="450" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banner/thangNu.jpg" class="d-block w-100" height="450" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- JS Bootstrap -->
    <?php include 'script.php' ?>
</body>

</html>