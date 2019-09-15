<?php
	session_start();

	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>PHP Sessions - Lesson 16 - Page 2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	Hello, <?php echo $name; ?>, your email is <?php echo $email; ?>
	<br>
	<a href="lesson_16_page_3.php">Go to page 3</a>
</body>
</html>