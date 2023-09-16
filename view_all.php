<?php
require('connection.php');
$q = "select * from customers";
$result = mysqli_query($con, $q);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <title>BankingSystem | View Customers</title>


</head>

<body>
    <?php
    require("navbar.html") ?>
    <div>
        <h1 class="text-white text-center p-3">Customer Profiles</h1>
        <table class="table table-dark table-striped table-border table-responsive">
            <caption class="text-white">List of Customers</caption>
            <thead>
                <tr>
                    <th scope="col">ID#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Balance</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th scope="row">
                        <?php echo $row['id'] ?>
                    </th>
                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <?php echo $row['email'] ?>
                    </td>
                    <td>
                        <?php echo $row['amount'] ?>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-danger" href=<?php echo "http://localhost/banking/profile.php?id=$row[id]" ?>>View</a>
                    </td>
                </tr>
            <?php } ?>
    </div>
</body>

</html>