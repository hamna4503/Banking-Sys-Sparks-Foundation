<?php
require('connection.php');
$id = $_GET['id'];
$q = "select * from customers where id=$id";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_array($result);
mysqli_close($con);
// $con . die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo "BankingSystem | Profile" . $row['id'] ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require("navbar.html") ?>
    <div class="container mt-5 mb-5 p-5 bg-dark bg-gradient profile-container">
        <h1 class='text-center text-white display-4 fw-bold'>
            <?php echo "Profile #" . $row['id'] ?>
        </h1>
        <div>
            <div class="row">
                <img class='profile-img img-thumbnail img-fluid p-0 mt-2 mr-0 col-lg-4 col-auto'
                    src="images/PERSON1.jpg" />
                <div class='text-white mt-2 h4 ml-0 col-lg-8 col-auto'>
                    <p><span>Name: </span><span>
                            <?php echo $row['name'] ?>
                        </span></p>
                    <span>

                        <p><span>Email: </span><span>
                                <?php echo $row['email'] ?>
                            </span></p>
                        <p><span>Balance: </span><span>
                                Rs
                                <?php echo $row['amount'] ?>
                            </span></p>
                        <a class='btn btn-danger' href=<?php echo "http://localhost/banking/transfer.php?sender=$row[id]&balance=$row[amount]" ?>>Transfer
                            Funds</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>