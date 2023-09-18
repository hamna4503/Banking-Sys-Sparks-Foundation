<?php
require('connection.php');
$q = "select * from customers";
$result = mysqli_query($con, $q);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BankingSystem | View Customers</title>
</head>

<body>
    <?php
    require("navbar.html") ?>
    <div class="container">
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