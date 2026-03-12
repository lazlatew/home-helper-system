<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Нова задача</h2>

<form method="POST" action="../controllers/save_task.php">

<input type="text" name="name" placeholder="Име на задачата">

<textarea name="description" placeholder="Описание"></textarea>

<input type="date" name="deadline">

<input type="number" name="budget">

<select name="category">

<option>Почистване</option>
<option>Грижа за домашни любимци</option>
<option>Грижа за дете</option>
<option>Грижа за възрастен човек</option>

</select>

<button>Създай</button>

</form>

</div>

</body>

</html>