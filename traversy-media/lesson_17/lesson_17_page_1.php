<?php
	if (isset($_POST['submit']))
	{
		$username = htmlentities($_POST['username']);

		setcookie('username', $username, time() + 3600);

		header('Location: lesson_17_page_2.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Lesson 17 Page 1</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
			</div>
			<button type="submit" id="submit" name ="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>