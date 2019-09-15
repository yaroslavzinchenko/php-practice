<!-- Урок 11 -->

<?php
	// echo $_GET['name'];
	// print_r($_GET);
	
	// Для того, чтобы при обработке форм
	// не было проблем с уязвимостями,
	// необходимо заключать вывод информации
	// с формы в тег htmlentities, как показано ниже.
	// echo htmlentities($_GET['name']);

	$name = htmlentities($_GET['name']);

	// POST безопаснее GET, так как передаёт
	// информацию не через URL, а через заголовок.
	// Использую HTTPS, можно шифровать данные,
	// отправляемые на сервер через форму.

	// print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lesson 11</title>
</head>
<body>
	<form method="GET" action="lesson_11.php">
		<div>
			<label for="">Name</label><br>
			<input type="text" name="name">
		</div>
		<div>
			<label for="">Email</label><br>
			<input type="text" name="email">
		</div>
		<input type="submit" value="Submit">
	</form>

	<ul>
		<li>
			<a href="lesson_11.php?name=Ivan">Ivan</a>
		</li>
		<li>
			<a href="lesson_11.php?name=Tema">Tema</a>
		</li>
	</ul>
	<h1><?php echo "{$name}'s Profile"; ?></h1>
</body>
</html>