<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BankingSystem | Input Amount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2KadrecUpdateF9CUG65"
        crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
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
            <button type="submit" class="btn btn-success" onclick="Trans()">Proceed</button>
        </form>
    </div>
</body>

</html>
<?php
require('connection.php');
$sender = $_GET['sender'];
$rec = $_GET['rec'];
$senderBalance = $_GET['senderBalance'];
$recBalance = $_GET['recBalance'];
$transferAmount = $_POST['transferAmount'];
// $alert=false;

if ($transferAmount > $senderBalance and $alert != true) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Insufficient balance for transfer.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
} else {
    $senderBalance -= $transferAmount;
    $recBalance += $transferAmount;
    $senderUpdate = "update customers set amount=$senderBalance where id=$sender";
    $recUpdate = "update customers set amount=$recBalance where id=$rec";
    $senderUpdate_check = mysqli_query($con, $senderUpdate);
    $recUpdate_check = mysqli_query($con, $recUpdate);
    mysqli_close($con);

    if (!($senderUpdate_check or $recUpdate_check)) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>ERROR</strong> Something went wrong.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    } else {
        ?>
        <div class="container">

            <!-- <div class="alert alert-success" role="alert">
                Success. Funds were transfered.Redirecting you shortly...
            </div> -->

            <?php
    }

}

?>