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
                        <a type="button" class="btn btn-success" href=<?php echo "inputAmount.php?sender=$sender&rec=$row[id]&senderBalance=$senderbalance&recBalance=$row[amount]" ?>>Transfer</a>
                    </td>
                </tr>

                <!-- sender id,rec id,to send -->
                <!-- Starting of modal -->
                <!-- <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog bg-dark border border-success">
                        <div class="modal-content bg-dark">
                            <div class="modal-header bg-dark">
                                <h4 class="modal-title text-white">Transfer Amount Input</h4>
                                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="transferAmount" class="text-white">Transfer Amount</label>
                                        <input type="number" class="form-control" id="transferAmount"
                                            aria-describedby="transferHelp" placeholder="Enter the amount">
                                        <small id="transferHelp" class="form-text text-white text-muted">Enter the desired
                                            transfer
                                            amount</small>
                                    </div>
                                    <button type="submit" class="btn btn-success">Transfer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End of modal -->

            <?php } ?>
    </div>

</body>

</html>