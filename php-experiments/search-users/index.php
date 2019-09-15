<?php
	session_start();

	$msg = '';
	$msgClass = '';

	$host = '';
	$user = '';
	$password = '';
	$database = '';

	// Check For Submit.
	if (filter_has_var(INPUT_POST, 'submit'))
	{
		if (isset($_POST['submit']) && !empty($_POST['host']) && !empty($_POST['user']) && !empty($_POST['database']))
		{
			$host = htmlentities($_POST['host']);
			$user = htmlentities($_POST['user']);
			$password = htmlentities($_POST['password']);
			$database = htmlentities($_POST['database']);

			$_SESSION['host'] = $host;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['database'] = $database;
		}
		else
		{
			// Не все поля заполнены. Проверки на пустой пароль нет,
			// так как пароль может быть пустым.
			$msg = 'Please, fill in all reqired fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<?php
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Connect to Database</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script>
		function showSuggestion(str)
		{
			if (str.length == 0)
			{
				document.getElementById('output').innerHTML = '';
			}
			else
			{
				// AJAX Request.
				let xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function()
				{
					if (this.readyState == 4 && this.status == 200)
					{
						document.getElementById('output').innerHTML = this.responseText;
					}
				}
	
				xmlhttp.open("GET", "suggest.php?q="+str, true);
				xmlhttp.send();
			}
		}
	</script>

</head>
<body>

	<div class="container">
		<br>
		<h1>Connect to Database</h1>
		<br>

		<?php if ($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
				<label for="hostInput">Host</label>
				<input type="text" id="hostInput" class="form-control" placeholder="Enter Host" name="host" value="<?php echo $host; ?>">
			</div>

			<div class="form-group">
				<label for="userInput">User</label>
				<input type="text" id="userInput" class="form-control" placeholder="Enter User" name="user" value="<?php echo $user; ?>">
			</div>
			
			<div class="form-group">
				<label for="passwordInput">Password</label>
				<input type="password" id="passwordInput" class="form-control" placeholder="Enter Password" name="password"  value="<?php echo $password; ?>">
			</div>

			<div class="form-group">
				<label for="databaseInput">Database</label>
				<input type="text" id="databaseInput" class="form-control" placeholder="Enter Database" name="database" value="<?php echo $database; ?>">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<div class="container">
		<br>
		<h1>Search Users</h1>
		<br>
	
		<form>
			<label for="userSearch">Search User: </label>
			<input type="text" id="userSearch" class="form-control" onkeyup="showSuggestion(this.value)">
		</form>
		<br>
		
		<p>
			Suggestions: 
			<span id="output" style="font-weight: bold"></span>
		</p>
	</div>

</body>
</html>