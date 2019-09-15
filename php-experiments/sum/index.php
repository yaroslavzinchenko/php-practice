<?php
	$success = false;

	$message = '';
	$msgClass = '';

	$sumNumber = '';

	function sum($a, $b)
	{
		return $a + $b;
	}

	if (isset($_POST['submit']))
	{
		$number1 = htmlentities($_POST['number1']);
		$number2 = htmlentities($_POST['number2']);

		if (!empty($number1) && !empty($number2))
		{
			// Поля не пустые. Проверяем, числа ли там.
			if (!is_numeric($number1))
			{
				$message = 'First value is not a number';
				$msgClass = 'alert-danger';
			}
			else if (!is_numeric($number2))
			{
				$message = 'Second value is not a number';
				$msgClass = 'alert-danger';
			}
			else
			{
				$sumNumber = sum($number1, $number2);

				$message = 'Your form has been submitted';
				$msgClass = 'alert-success';

				$success = true;
			}
		}
		else
		{
			// Какое-то поле пустое.
			$message = 'Please, fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Sum</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<p>
			<?php if ($message != ''): ?>
				<div class="alert <?php echo $msgClass; ?>"><?php echo $message; ?></div>
			<?php endif; ?>
		</p>

		<p>
			<h1>Sum of two numbers</h1>
		</p>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="number1">Number 1</label>
				<input type="text" class="form-control" id="number1" name="number1">
			</div>
			<div class="form-group">
				<label for="number2">Number 2</label>
				<input type="text" class="form-control" id="number2" name="number2">
			</div>

			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>

		<?php if ($success): ?>
		<p>
			<h2>Sum: <?php echo $sumNumber; ?></h2>
		</p>
		<?php endif; ?>
	</div>

	<!-- Clear button -->
</body>
</html>