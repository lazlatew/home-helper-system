<?php

include("../config/database.php");

$id=$_GET['id'];

$users=mysqli_query($conn,"SELECT * FROM users");

?>

<!DOCTYPE html>

<html>

<body>

<h2>Назначи домашен помощник</h2>

<form method="POST" action="../controllers/assign_housekeeper.php">

<input type="hidden" name="task_id" value="<?php echo $id; ?>">

<select name="housekeeper">

<?php while($row=mysqli_fetch_assoc($users)){ ?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['username']; ?>

</option>

<?php } ?>

</select>

<button>Назначи</button>

</form>

</body>

</html>