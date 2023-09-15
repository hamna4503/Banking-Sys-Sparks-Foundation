<?php
$con = mysqli_connect("localhost", "root", "");
if (!$con) {
    echo "Connection failed";
} else {
    mysqli_select_db($con, "banking");
}
?>