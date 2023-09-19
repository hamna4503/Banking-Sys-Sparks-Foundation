<!-- Establishing the connection here so that it can be required within different files as per need. -->
<?php
$user = "root";
$password = "";
$database = "banking";
$con = mysqli_connect("localhost", $user, $password);
if (!$con) {
    echo "Connection failed";
    exit();
} else {
    mysqli_select_db($con, $database);
}
?>