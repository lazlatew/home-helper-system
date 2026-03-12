<?php

include("../config/database.php");

$username = $_POST['username'];
$password = $_POST['password'];
$first = $_POST['first_name'];
$last = $_POST['last_name'];

$role = "Client";

$sql = "INSERT INTO users(username,password,first_name,last_name,role)
VALUES('$username','$password','$first','$last','$role')";

mysqli_query($conn,$sql);

header("Location: ../views/login.php");

?>