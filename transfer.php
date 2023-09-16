<?php
require('connection.php');
$sender = $_GET['sender'];
$senderBalance = $_GET['balance'];
// $id = 1;
$q = "select * from customers where id !=$sender";
$result = mysqli_query($con, $q);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function BalanceCheck(senderInput, senderBalance) {
            if (senderInput > senderBalance) {
                alert("Insuffient Balance for transfer");
            }
        }
        function Transfer(senderId, recId, senderBalance, recBalance) {
            let modal = document.createElement('div');
            modal.innerText = "Hello";
            modal.style.color = "white";
            // modal.style.zIndex = 100000;
            document.body.append('modal');
        }
    </script>

</head>

<body>
    <?php require('navbar.html') ?>
    <div>
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
                        <button class="btn btn-primary btn-danger"
                            onclick="Transfer(<?php echo $sender ?>,<?php echo $row['id'] ?>,<?php echo $senderBalance ?>,100)">Transfer</button>
                    </td>
                </tr>
            <?php } ?>
    </div>

</body>

</html>