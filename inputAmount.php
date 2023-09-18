<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankingSystem | Input Amount</title>
</head>

<body>
    <?php require("navbar.html") ?>
    <div class="container profile-container mt-5 p-5">
        <form method="POST">
            <div class="form-group">
                <label for="transferAmount" class="text-white">Transfer Amount</label>
                <input type=" number" class="form-control" id="transferAmount" aria-describedby="transferHelp"
                    placeholder="Enter Transfer Amount" name="transferAmount" required>
                <small id=" transferHelp" class="form-text text-muted text-white">Amount to transfer.</small>
            </div>
            <button type="submit" class="btn btn-success">Proceed</button>
        </form>
    </div>
</body>

</html>
<?php
require('connection.php');
// for sender
$sender = $_GET['sender'];
$senderBalance = $_GET['senderBalance'];
// for reciever:
$rec = $_GET['rec'];
$recBalance = $_GET['recBalance'];

$get_rec_name = "select name from customers where id=$rec";
$rec_name_result = mysqli_query($con, $get_rec_name);
$rec_name = (mysqli_fetch_assoc($rec_name_result))['name'];
$transferAmount = $_POST['transferAmount'];

if (($transferAmount > $senderBalance) || ($transferAmount < 0)) {
    ?>
    <div class="alert alert-danger alert-dismissible show container" role="alert">
        <strong>ERROR</strong> Wrong input OR Insufficient Balance.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
} else {
    if ($transferAmount != 0) {
        $senderBalance -= $transferAmount;
        $recBalance += $transferAmount;
        $senderUpdate = "update customers set amount=$senderBalance where id=$sender";
        $recUpdate = "update customers set amount=$recBalance where id=$rec";
        $senderUpdate_check = mysqli_query($con, $senderUpdate);
        $recUpdate_check = mysqli_query($con, $recUpdate);

        // checking if one of the query has failed for some reason
        if (!($senderUpdate_check or $recUpdate_check)) {
            ?>
            <div class=" alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ERROR</strong> Something went wrong.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        } else {
            $history = "insert into history(sender,recieverId,recieverName,amount) values($sender,$rec,
        '$rec_name',$transferAmount)";
            mysqli_query($con, $history);
            ?>
            <div class="alert alert-success alert-dismissible fade show container" role="alert">
                <strong>Funds Transferred.</strong> You will now be redirected in a few seconds...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <meta http-equiv="Refresh" content="2; url='http://localhost/banking/history.php?sender=<?php echo $sender ?>'">
            <?php

        }
    }
}
?>