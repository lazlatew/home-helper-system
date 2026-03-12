<?php

include("../config/database.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

header("Location: ../views/dashboard.php");

}else{

echo "Грешно потребителско име или парола";

}

?>