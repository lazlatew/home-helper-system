<?php

include("../config/database.php");

$task=$_POST['task_id'];
$housekeeper=$_POST['housekeeper'];

$sql="UPDATE tasks 
SET housekeeper_id='$housekeeper', status='Assigned'
WHERE id=$task";

mysqli_query($conn,$sql);

header("Location: ../views/admin.php");

?>