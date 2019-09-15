<?php
	$someGuy = ['name' => 'Yaroslav', 'email' => 'test@mail.com', 'age' => 20];

	$someGuy = serialize($someGuy);

	setcookie('someGuy', $someGuy, time() + 3600);

	if (isset($_COOKIE['username']))
	{
		echo 'User '.($_COOKIE['username']).' is set<br>';
	}
	else
	{
		echo 'User is not set<br>';
	}

	$someGuy = unserialize($_COOKIE['someGuy']);
	
	echo $someGuy['email'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Lesson 17 Page 2</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		
	</div>
</body>
</html>