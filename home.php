<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankingSystem | Home</title>
</head>

<body>
    <?php
    require("navbar.html");
    ?>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bank.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h3>Welcome to Banking System</h3>
                    <p>This system is made as a task of The Sparks Foundation's Internship Program.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/currency.jpg" class="d-block w-100" alt="heyy" />
                <div class="carousel-caption d-none d-md-block">
                    <h2>What tasks can you perform?</h2>
                    <p>Transfer funds among various users and view their records.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>

</html>