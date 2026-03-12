 
<?php

include("../config/database.php");

$search="";

if(isset($_GET['search'])){
$search=$_GET['search'];
}

$sql="SELECT * FROM tasks WHERE name LIKE '%$search%'";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="container">

<h2>Всички задачи</h2>

<form method="GET">

<input type="text" name="search" placeholder="Търси задача">

<button>Търси</button>

</form>
<table border="1">

<tr>
<th>Име</th>
<th>Описание</th>
<th>Статус</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td><?php echo $row['status']; ?></td>
<td>

<a href="../controllers/change_status.php?id=<?php echo $row['id']; ?>">

Маркирай изпълнена

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>