<?php
require("connection.php");
$sender = $_GET['sender'];
$view_history = "select * from history where sender=$sender";
$history_records = mysqli_query($con, $view_history);
if (!$history_records) {
    ?>
    <h1?>No records yet</h1>
        <?php
} else {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Banking System | Transfer History</title>
        </head>

        <body>
            <?php
            require("navbar.html");
            ?>
            <div class="container-fluid">
                <small><a class="text-success text-right" href="http://localhost/banking/home.php">Back to home</a>
                    <h1 class="text-white text-center p-3">Transaction History for id#
                        <?php echo $sender ?>
                    </h1>
                    <table class="table table-dark table-striped table-border table-responsive">
                        <caption class="text-white">History of transfers for id#
                            <?php echo $sender ?>
                        </caption>
                        <thead>
                            <th scope="col">Reciever ID</th>
                            <th scope="col">Reciever Name</th>
                            <th scope="col">Amount Transferred</th>

                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($history_records)) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $row['recieverId'] ?>
                                </th>
                                <td>
                                    <?php echo $row['recieverName'] ?>
                                </td>
                                <td>
                                    <?php echo $row['amount'] ?>
                                </td>

                            </tr>
                        <?php } ?>
        </body>

        </html>
        <?php
}
?>