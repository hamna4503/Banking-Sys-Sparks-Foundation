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
</head>

<body>
    <?php
    require("navbar.html") ?>
    <small><a class="text-success text-right container" href="http://localhost/banking/view_all.php">Back
            To View All</a></small>
    <div class="container mt-5 mb-5 p-5 bg-dark bg-gradient profile-container">
        <h1 class='text-center text-white display-4 fw-bold'>
            <?php echo "Profile #" . $row['id'] ?>
        </h1>
        <div>
            <div class="row">
                <img class='profile-img img-thumbnail img-fluid p-0 mt-2 mr-0 col-lg-4 col-auto'
                    src="images/person<?php echo $row['id'] ?>.jpg" />
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
                        <a class='btn btn-success m-1' href=<?php echo "http://localhost/banking/transfer.php?sender=$row[id]&balance=$row[amount]" ?>>Transfer
                            Funds</a>
                        <a class='btn btn-danger m-1' href=<?php echo "http://localhost/banking/history.php?sender=$row[id]" ?>>View Transfer History</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>