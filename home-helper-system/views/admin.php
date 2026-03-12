<?php

include("../config/database.php");

$tasks=mysqli_query($conn,"SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Администратор панел</h2>

<h3>Всички задачи</h3>

<table border="1">

<tr>
<th>Име</th>
<th>Статус</th>
<th>Назначи помощник</th>
</tr>

<?php while($row=mysqli_fetch_assoc($tasks)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="assign.php?id=<?php echo $row['id']; ?>">

Назначи

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>