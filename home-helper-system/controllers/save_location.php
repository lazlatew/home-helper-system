<?php

include("../config/database.php");

$name=$_POST['name'];
$address=$_POST['address'];

$sql="INSERT INTO locations(name,address) VALUES('$name','$address')";

mysqli_query($conn,$sql);

header("Location: ../views/locations.php");

$result=mysqli_query($conn,"SELECT * FROM tasks WHERE location_id=$id");

if(mysqli_num_rows($result)>0){

echo "Не може да изтриеш локация със задачи";

exit();

}

?>