<?php

include("../config/database.php");

$id=$_GET['id'];

$sql="UPDATE tasks SET status='Completed' WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: ../views/tasks.php");

?>