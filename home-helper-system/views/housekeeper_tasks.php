<?php

include("../config/database.php");

$result=mysqli_query($conn,"SELECT * FROM tasks WHERE status='Assigned'");

?>

<h2>Задачи за домашния помощник</h2>

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

</tr>

<?php } ?>

</table>