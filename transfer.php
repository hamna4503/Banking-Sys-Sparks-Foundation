<?php
require('connection.php');
$sender = $_GET['sender'];
$senderbalance = $_GET['balance'];
$q = "select * from customers where id !=$sender";
$result = mysqli_query($con, $q);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BankingSystem | Transfer</title>
</head>

<body>
    <?php require('navbar.html') ?>
    <div class="container">
        <small><a class="text-success text-right"
                href="http://localhost/banking/profile.php?id=<?php echo $sender ?>">Back
                to profile</a></small>
        <h1 class="text-white text-center p-3">Transfer List for ID#
            <?php echo $sender ?>
        </h1>
        <table class="table table-dark table-striped table-border">
            <caption class="text-white">List of Customers to transfer amount</caption>
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
                        <a type="button" class="btn btn-success" href=<?php echo "inputAmount.php?sender=$sender&rec=$row[id]&senderBalance=$senderbalance&recBalance=$row[amount]" ?>>Transfer</a>
                    </td>
                </tr>
            <?php } ?>
    </div>

</body>

</html>