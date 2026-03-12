<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Регистрация</h2>

<form method="POST" action="../controllers/register_user.php">

<input type="text" name="username" placeholder="Потребителско име" required>

<input type="password" name="password" placeholder="Парола" required>

<input type="text" name="first_name" placeholder="Име">

<input type="text" name="last_name" placeholder="Фамилия">

<button type="submit">Регистрация</button>

</form>

</div>

</body>

</html>