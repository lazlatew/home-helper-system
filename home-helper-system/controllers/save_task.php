<?php

include("../config/database.php");

$name = $_POST['name'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$budget = $_POST['budget'];
$category = $_POST['category'];

$status = "Pending";

$sql = "INSERT INTO tasks(name,description,deadline,budget,category,status)
VALUES('$name','$description','$deadline','$budget','$category','$status')";

mysqli_query($conn,$sql);

header("Location: ../views/dashboard.php");

?>