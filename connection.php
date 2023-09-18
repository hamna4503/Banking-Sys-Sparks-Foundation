<!-- Establishing the connection here so that it can be required within different files as per need. -->
<?php
$con = mysqli_connect("localhost", "root", "");
if (!$con) {
    echo "Connection failed";
    exit();
} else {
    mysqli_select_db($con, "banking");
}
?>