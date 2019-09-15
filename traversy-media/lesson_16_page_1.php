<?php
	if (isset($_POST['submit']))
	{
		session_start();

		$_SESSION['name'] = htmlentities($_POST['name']);
		$_SESSION['email'] = htmlentities($_POST['email']);

		header('Location: lesson_16_page_2.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>PHP Sessions - Lesson 16 - Page 1</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="exampleName">Name</label>
				<input type="text" class="form-control" id="exampleName" name="name" placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="exampleEmail">Email address</label>
				<input type="email" class="form-control" id="exampleEmail" name="email" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<button type="submit" name ="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>